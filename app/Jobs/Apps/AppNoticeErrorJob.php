<?php

namespace App\Jobs\Apps;

use App\Jobs\BaseJob;
use App\Models\Devops\Apps\AppDingTalkRobot;
use App\Models\Devops\Apps\Apps;
use App\Models\Devops\Apps\AppWarning;
use App\Services\DingTalk\DingTalkService;
use Exception;
use Illuminate\Support\Facades\Log;

class AppNoticeErrorJob extends BaseJob
{

    const QUEUE = 'app:notice:error';

    private $log;

    protected $error_id;

    /**
     * Create a new job instance.
     *
     * @param $error_id
     */
    public function __construct($error_id)
    {
        parent::__construct();

        $this->log = Log::channel('app_notice_error_job');

        $this->error_id = $error_id;
    }

    /**
     * 推送队列
     * @param $error_id
     * @param false $sync
     */
    public static function push($error_id, $sync = false)
    {
        if ($sync) {
            dispatch_now(new AppNoticeErrorJob($error_id));
        } else {
            dispatch(new AppNoticeErrorJob($error_id))->onQueue(self::QUEUE);
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->_run();
        } catch (Exception $e) {
            $this->log->error('应用错误预警发生错误:' . $e->getMessage());
        }
    }

    /**
     * 处理逻辑
     * @throws Exception
     */
    protected function _run()
    {
        if (!$error = AppWarning::query()->find($this->error_id)) {
            return;
        }

        $app_id         = $error->app_id;
        $error_code     = $error->error_code;
        $content        = $error->content;
        $request_ip     = $error->request_ip;
        $created_ts     = $error->created_ts;

        $this->pushToDingTalk($app_id, $error_code, $content, $request_ip, $created_ts);

//        //应用联系人
//        $app_contact = AppContact::query()
//            ->where('app_id', $app_id)
//            ->where('status', AppContact::STATUS_ON)
//            ->pluck('contact_phone')
//            ->toArray();

    }

    /**
     * 发送给钉钉
     * @param $app_id
     * @param $error_code
     * @param $content
     * @param $request_ip
     * @param $created_ts
     * @throws Exception
     */
    protected function pushToDingTalk($app_id, $error_code, $content, $request_ip, $created_ts)
    {
        if (!$app = Apps::query()->find($app_id)) {
            throw new Exception('未能找到APP');
        }

        //钉钉机器人列表
        $robot_list = AppDingTalkRobot::validRobot($app_id);
        if (empty($this->robot_list)) {
            throw new Exception("无可用机器人，APP_ID:{$app_id}，APP名称：{$app->app_name}");
        }

        $title = "{$app->app_name} 致命错误告警";
        $msg = "#### <font color='red'>{$title}</font>
> <font color='red'>错误标识码：</font>" . $error_code . " </br>
> <font color='red'>内容：</font>" . $content . " </br>
> <font color='red'>请求IP：</font>" . $request_ip . " </br>
> <font color='red'>创建时间：</font>" . $created_ts . " </br>";


        $option = [
            'robot_list' => $robot_list
        ];
        (new DingTalkService($option))->setMarkdownContent($title, $msg)->send();
    }

    /**
     * 发送给应用联系人
     */
    protected function pushToAppContact()
    {
        #todo
    }



}

<?php

namespace App\Console\Commands\Test;

use App\Models\Devops\Apps\AppDingTalkRobot;
use App\Models\Devops\Apps\Apps;
use App\Models\Devops\Apps\AppWarning;
use App\Services\DingTalk\DingTalkService;
use Exception;
use Illuminate\Cache\RedisLock;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class Test extends Command
{

    /**
     * 命令行执行命令
     * php artisan test
     * @var string
     */
    protected $signature = "test {time=60}";

    /** 命令描述 @var string */
    protected $description = '';

    protected $sleep = 5;

    public function handle()
    {
        $sleep = $this->argument('time'); //任务间隔时间

        $error_id = 1;
        if (!$error = AppWarning::query()->find($error_id)) {
            return;
        }

        $app_id         = $error->app_id;
        $error_code     = $error->error_code;
        $content        = $error->content;
        $request_ip     = $error->request_ip;
        $created_ts     = $error->created_ts;

        if (!$app = Apps::query()->find($app_id)) {
            throw new Exception('未能找到APP');
        }

        //钉钉机器人列表
        $robot_list = AppDingTalkRobot::validRobot($app_id);
        dd(
            $robot_list
        );
        if (empty($this->robot_list)) {
            throw new Exception("无可用机器人，APP_ID:{$app_id}，APP名称：{$app->app_name}");
        }



        $title = "{$app->app_name} 致命错误告警";
        $msg = "#### <font color='red'>{$title}</font>
> <font color='red'>错误标识码：</font>" . $error_code . " </br>
> <font color='red'>内容：</font>" . $content . " </br>
> <font color='red'>请求IP：</font>" . $request_ip . " </br>
> <font color='red'>创建时间：</font>" . $created_ts . " </br>";

        (new DingTalkService())->setMarkdownContent($title, $msg)->send();

        dd(

        );

        $data = [
            "username" => "zf610ztbrladmin",
            "traceId" => "{{traceId}}",
            "gameCode"=>"PGS_1513328",
            "language"=>"pt",
            "platform"=>"web",
            "currency"=>"BRL",
            "lobbyUrl"=>"http://p.scoreserv.com",
            "ipAddress"=>"103.142.140.140"
        ];

        $json = json_encode($data, true);

        $url = 'https://stg.gasea168.com/game/url';


        $traceId = '49151bdd-b338-453a-b07a-06ad05c4e1c7';

        $json = str_replace('{{traceId}}', $traceId, $json);

        $apiSecret = "b4eaf809b72eb7c921c2b088a03e7571ab082a9a4e0479a77cb5130a7d029b28";

        //8fdcb07e842774246997c69dc4cec1519619d27663d39200473ed01c87b8b5fc

        //c3953f5e521ebd4bda944c6558a40b8a1a07326bb1ea84a5d06504893847d387

        //CryptoJS.HmacSHA256(json, apiSecret).toString();


        dd(
            hash_hmac('sha256', $json, $apiSecret)
        );



        //

        dd(
            Hash::make('admin123456')
        );



        #############  生成 APP  ##############
        $name = 'Vod_Api';
        $app_key = Apps::createAppKey();
        $app_secret = Apps::createAppSecret();
        $remark = '';
        $status = Apps::APP_STATUS_ON;
        dd(
            Apps::createApp($name, $app_key, $app_secret, $remark, $status)
        );

        echo time();
    }



}

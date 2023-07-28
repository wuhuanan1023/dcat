<?php

namespace App\Console\Commands\Apps;

use App\Jobs\Apps\AppNoticeErrorJob;
use App\Models\Devops\Apps\Apps;
use App\Models\Devops\Apps\AppWarning;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AppNoticeError extends Command
{

    /**
     * 命令行执行命令
     * php artisan app:error:notice
     * @var string
     */
    protected $signature = "app:error:notice {time=60}";

    /** 命令描述 @var string */
    protected $description = '应用错误预警';

    protected $sleep = 5;

    public function handle()
    {
        $sleep = $this->argument('time'); //任务间隔时间
        echo time();

        $begin_ts = time() - 500;

        $error_list = AppWarning::query()
            ->where('level', AppWarning::LEVEL_ERROR)
            ->where('status', AppWarning::STATUS_WAIT)
            ->where('notice_ts', 0)
            ->where('created_ts', '<', $begin_ts)
            ->limit(100)
            ->get();

        foreach ($error_list as $error) {
            //推送发送队列
            AppNoticeErrorJob::push($error->id);
        }

    }



}

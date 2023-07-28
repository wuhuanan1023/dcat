<?php

namespace App\Console\Commands\Apps;

use App\Models\Devops\Apps\Apps;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AppNoticeHealth extends Command
{

    /**
     * 命令行执行命令
     * php artisan app:error:notice
     * @var string
     */
    protected $signature = "app:health:notice {time=60}";

    /** 命令描述 @var string */
    protected $description = '应用健康提示';

    protected $sleep = 5;

    public function handle()
    {
        $sleep = $this->argument('time'); //任务间隔时间
        echo time();

        #TODO








    }



}

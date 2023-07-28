<?php

namespace App\Models\Devops\Apps;

use App\Models\Devops\BaseModel;

class AppDingTalkRobot extends BaseModel
{

    protected $table = 'app_ding_talk_robot';
    protected $guarded = [];

    # 状态：0-禁用；1-正常
    const STATUS_OFF  = 0; //禁用
    const STATUS_ON   = 1; //正常
    const STATUS_MAP = [
        self::STATUS_OFF    => '禁用',
        self::STATUS_ON     => '正常',
    ];

    /**
     * 获取 app 下的可用钉钉机器人
     * @param $app_id
     * @return array
     */
    public static function validRobot($app_id)
    {
        return AppDingTalkRobot::query()
            ->select([
                'id', 'app_id', 'webhook', 'secret', 'status', 'modify_ts'
            ])
            ->where('app_id', $app_id)
            ->where('status', self::STATUS_ON)
            ->get()->toArray();
    }

}

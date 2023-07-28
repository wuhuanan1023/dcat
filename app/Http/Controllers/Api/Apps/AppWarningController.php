<?php

namespace App\Http\Controllers\Api\Apps;

use App\Http\Controllers\Api\BaseController;
use App\Models\Devops\Apps\Apps;
use App\Models\Devops\Apps\AppWarning;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * 应用告警
 * Class AppWarningController
 * @package App\Http\Controllers\Admin\Apps
 */
class AppWarningController extends BaseController
{

    /**
     * 获取项目传上来的日志告警
     * @param Request $request
     * @return mixed
     */
    public function receive(Request $request)
    {
        $request->validate([
            'app_key'   => 'required',
            'level'     => 'required',
            'content'   => 'required',
        ]);
        $app_key    = $request->post('app_key');
        $level      = $request->post('level');
        $content    = $request->post('content');
        $error_code = $request->post('error_code', '');

        if (!isset(AppWarning::LEVEL_MAP[$level])) {
            return $this->failed("level参数错误！");
        }

        $request_ip = func_app_ip();

        $app_id = Apps::query()->where('app_key', $app_key)->value('id');
        if (!$app_id) {
            return $this->failed("未能找到相关应用！");
        }

        try {
            AppWarning::query()->create([
                    'app_id'     => $app_id,
                    'level'      => $level,
                    'error_code' => $error_code,
                    'content'    => $content,
                    'request_ip' => $request_ip,
                    'status'     => AppWarning::STATUS_WAIT,
                    'created_ts' => time(),
                    'updated_ts' => time(),
                ]);
            return $this->success();
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }


}

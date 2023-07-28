<?php

namespace App\Http\Controllers\Api\Apps;

use App\Http\Controllers\Api\BaseController;
use App\Models\Devops\Apps\Apps;
use Illuminate\Http\Request;


class AppsController extends BaseController
{


    /**
     * 创建APP
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $request->validate([
            'app_name'   => 'required',
        ]);
        $app_name   = $request->post('app_name');
        $remark     = $request->post('remark');

        try {
            $app_key    = Apps::createAppKey();
            $app_secret = Apps::createAppSecret();
            $status     = Apps::APP_STATUS_ON;
            Apps::createApp(0, $app_name, $app_key, $app_secret, $remark, $status);
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
        $return = [
            'app_name'   => $app_name,
            'app_key'    => $app_key,
            'app_secret' => $app_secret,
        ];
        return $this->success($return);
    }



}

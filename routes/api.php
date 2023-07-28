<?php

use App\Http\Controllers\Api\Apps\AppHealthCheckController;
use App\Http\Controllers\Api\Apps\AppWarningController;
use App\Http\Controllers\Api\Common\ServerSyncController;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * 默认添加 /api 前缀，规则见 @see RouteServiceProvider::mapApiRoutes()
 */

//示例：
/*
 Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
 });
 */


/** @var Router $router */

################### 不需要用户认证 #####################
$router->group([
    'middleware' => []
], function () use ($router) {

    //根目录
    $router->any('/',  function () use ($router) {return app()->version();});

    $router->group([], function () use ($router) {
        //服务器同步
        $router->post('servers/server-sync', ServerSyncController::class . '@serverSync');
    });

    ################### 需要APP验签 #####################
    $router->group([
        'middleware' => [
            'app_check_sign' //APP验签
        ]
    ], function () use ($router) {
        //APP管理
        $router->group([], function () use ($router) {
            //健康上报
            $router->post('apps/health/check', AppHealthCheckController::class . '@healthCheck');

            //预警上报
            $router->post('apps/warning/submit', AppWarningController::class . '@receive');
        });
    });

});
################### 不需要用户认证 #####################


################################需要用户认证################################
$router->group([
    'prefix' => 'api',
    'middleware' => [
        'auth:app',
    ]
], function () use ($router) {

});
################################需要用户认证################################



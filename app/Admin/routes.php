<?php

use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\Platform\PlatformController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    #'namespace'  => config('admin.route.namespace'),
    'namespace'  => '',
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', HomeController::class . '@index');

    #平台管理
    $router->group([], function () use ($router) {

        $router->resource('platform', PlatformController::class);
    });

});

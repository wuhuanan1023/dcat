<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponseTrait;
use App\Traits\PageTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class BaseController extends Controller
{

    use ApiResponseTrait,PageTrait;

    /**
     * 授权守卫
     * @var string
     */
    protected $guard = 'app';

    /**
     * 获取登录用户信息
     * @return Authenticatable|null
     */
    protected function user()
    {
        return Auth::guard($this->guard)->user();
    }

    /**
     * 生成用户TOKEN
     * @param $user
     */
    protected function token($user)
    {
        return Auth::guard($this->guard)->login($user);
    }

    /**
     * 销毁TOKEN
     */
    protected function invalidate()
    {
        try{
            JWTAuth::setToken(JWTAuth::getToken())->invalidate();
        }catch (TokenExpiredException $e){
            //因为让一个过期的token再失效，会抛出异常，所以我们捕捉异常，不需要做任何处理
        }
    }

}

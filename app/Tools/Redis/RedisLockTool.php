<?php

namespace App\Tools\Redis;

use Illuminate\Support\Facades\Redis;

/**
 * @class redis锁
 */
class RedisLockTool
{

    public function __construct(){
    }

    /**
     * 获取锁
     * @param string $key 锁标识
     * @param int $expire 锁过期时间
     * @param int $num 重试次数
     * @return bool
     */
    public function lock(string $key, $expire = 5, $num = 0)
    {
        $isLock = Redis::setnx($key, time() + $expire);

        if (!$isLock) {
            //获取锁失败则重试{$num}次
            for ($i = 0; $i < $num; $i++) {
                $isLock = Redis::setnx($key, time() + $expire);
                if ($isLock) {
                    break;
                }
                sleep(1);
            }
        }
        // 不能获取锁
        if (!$isLock) {
            // 判断锁是否过期
            $lockTime = Redis::get($key);
            // 锁已过期，删除锁，重新获取
            if (time() > $lockTime && time() > Redis::getSet($key, time() + $expire)) {
                $this->unlock($key);
                $isLock = Redis::setnx($key, time() + $expire);
            }
        }
        return $isLock ? true : false;
    }

    /**
     * 释放锁
     * @param String $key 锁标识
     * @return Boolean
     */
    public function unlock($key)
    {
        return Redis::del($key);
    }
}

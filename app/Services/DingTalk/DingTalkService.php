<?php

namespace App\Services\DingTalk;

use App\Tools\Redis\RedisLock;
use App\Tools\Redis\RedisLockTool;
use Exception;

/**
 * @class 钉钉机器人类
 * --options atMobiles @人的手机号  isAll @所有人
 */
class DingTalkService
{
    protected $options;

    protected $params;

    //机器人消息请求地址
    protected $webhook;

    //机器人密钥
    protected $secret;

    //机器人列表
    protected $robot_list = [];

    //应用ID
    protected $app_id = [];

    public function __construct($options = [])
    {
        $this->options = $options;

        $this->robot_list = $options['robot_list'] ?? [];
    }

    /**
     * 发送消息
     * @throws Exception
     */
    public function send(): void
    {
        $this->getRoboConfig();
        [$timestamp, $sign] = $this->getSign();
        $this->webhook .= "&timestamp={$timestamp}&sign={$sign}";
        $this->requestByCurl($this->webhook, json_encode($this->params));
    }

    /**
     * 获取机器人签名
     * @return array
     */
    protected function getSign()
    {
        $secret = $this->secret;
        // 当前时间(毫秒)
        $timestamp = time() * 1000;
        // HmacSHA256加密,设置为 true 输出原始二进制数据
        $hmacSha256 = hash_hmac('sha256', $timestamp . "\n" . $secret, $secret, true);
        $sign = urlencode(base64_encode($hmacSha256));
        return [$timestamp, $sign];
    }

    /**
     * 文本消息
     * @param       $content
     * @param array $option atMobiles @人的手机号  isAll @所有人
     * @return DingTalkService
     */
    public function setTextContent($content, array $option = []): DingTalkService
    {
        $params = [
            'text' => [
                'content' => $content
            ],
            'msgtype' => 'text'
        ];
        $this->params = array_merge($params, $option);
        return $this;
    }

    /**
     * 链接类型消息
     * @param string $title 消息标题
     * @param string $content 消息内容
     * @param string $picUrl 图片链接
     * @param string $msgUrl 消息跳转链接
     * @return DingTalkService
     */
    public function setLinkContent(string $title, string $content, string $picUrl = '', string $msgUrl = ''): DingTalkService
    {
        $params = [
            'msgtype' => 'link',
            'link' => [
                'title' => $title,
                'text' => $content,
                'picUrl' => $picUrl,
                'messageUrl' => $msgUrl
            ]
        ];
        $this->params = $params;
        return $this;
    }

    /**
     * markdown 类型消息
     * @param       $title
     * @param       $content
     * @param array $option
     * @return DingTalkService
     */
    public function setMarkdownContent($title, $content, array $option = []): DingTalkService
    {
        $params = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => $title,
                'text' => $content
            ]
        ];
        $this->params = array_merge($params, $option);
        return $this;
    }


    /**
     * 获取当前机器人
     * @throws Exception
     */
    protected function getRoboConfig()
    {

        if (empty($this->robot_list)) {
            throw new Exception('当前APP无可用机器人');
        }

        $flag = false;

        $redisLock = new RedisLockTool();

        foreach ($this->robot_list as $robot) {
            //赋值
            $this->webhook = $robot['webhook'] ?? '';
            $this->secret  = $robot['secret'] ?? '';
            if (!$this->webhook || !$this->secret) {
                continue;
            }
            //给这个机器人上锁
            if ($redisLock->lock($this->secret, 3)) {
                $flag = true;
                break;
            }
        }
        if (!$flag) {
            $this->getRoboConfig();
        }
    }

    /**
     * 错误异常消息
     * @param Exception $e
     */
    public function sendErrorMsg(Exception $e, $errTitle = 'Server Error')
    {
        $enable = config('dingding.robot.enable');
        if (!$enable) {
            return;
        }
        $content = $this->errorMarkdownFormat($e, __($errTitle));
        $this->setMarkdownContent(__($errTitle), $content, ['at' => ['isAll' => true]])->send();
    }

    /**
     * 程序错误消息通知模板
     * @param Exception $e
     * @return string
     */
    protected function errorMarkdownFormat(Exception $e, $title)
    {
        $request = Request::instance();
        return "#### <font color='red'>{$title}</font>
> <font color='red'>错误消息：" . $e->getMessage() . " </font></br>
> <font color='red'>文件位置：" . $e->getFile() . " 第 " . $e->getLine() . "行</font></br>
> <font color='red'>请求域名：" . $request->host() . "</font> </br>
> <font color='red'>请求地址：" . $request->url() . "</font> </br>";
    }


    /**
     * curl 发送
     * @param $webhook_url
     * @param $postData
     * @return mixed
     */
    protected function requestByCurl($webhook_url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webhook_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json;charset=utf-8')
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data);
    }

}

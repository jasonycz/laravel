<?php


include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件
use EasyWeChat\Foundation\Application;

function p($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}
function ps($str){
    p($str);
    die();
}

$options = [
    'debug'  => true,
    // 'app_id' => 'wxe176fb86dd7f30d2',
    // 'secret' => 'fdf298ad5609eee88200e9e4d909ea42',
    'app_id' => 'wx2d7d0c444019553e',
    'secret' => '162b077a9b6703f03341fdd69cbeee08',
    'token'  => 'yuanlairuci',
    // 'aes_key' => null, // 可选
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/yuanlairuci.log', // XXX: 绝对路径！！！！
    ],

];
$app = new Application($options);

$server = $app->server;
$userService = $app->user;
$users = $userService->lists();
p($users);


$server->setMessageHandler(function ($message) {
    switch ($message->MsgType) {
        case 'event':
            # 事件消息...
            break;
        case 'text':
            # 文字消息...
            return 'text';
            break;
        case 'image':
            # 图片消息...
            return 'img';
            break;
        case 'voice':
            # 语音消息...
            break;
        case 'video':
            # 视频消息...
            break;
        case 'location':
            # 坐标消息...
            break;
        case 'link':
            # 链接消息...
            break;
        // ... 其它消息
        default:
            # code...
            break;
    }
    // ...
});

$response = $app->server->serve();
$response->send();

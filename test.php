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
    'app_id' => 'wxe176fb86dd7f30d2',
    'secret' => 'fdf298ad5609eee88200e9e4d909ea42',
    'token'  => 'yuanlairuci',
    // 'aes_key' => null, // 可选
    
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/yuanlairuci.log', // XXX: 绝对路径！！！！
    ],
    
];
$app = new Application($options);


$server = $app->server;
$user = $app->user;

// p('$server');
// p($server);

p('$server->serve()');
p($server->serve());

p('$user');
ps($user);

$server->setMessageHandler(function($message) use ($user) {
    $fromUser = $user->get($message->FromUserName);

    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
});

$server->serve()->send();

// 将响应输出
// $response->send(); // Laravel 里请使用：return $response;
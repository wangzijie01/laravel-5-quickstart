<?php

namespace App\Http\Controllers\Wechat;

use App\Handler\TextMessageHandler;
use App\Handler\EventMessageHandler;
use App\Http\Controllers\Controller;
use EasyWeChat\Kernel\Messages\Message;

class WechatController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(TextMessageHandler::class, Message::TEXT);
        $app->server->push(EventMessageHandler::class, Message::EVENT);

        return $app->server->serve();
    }
}

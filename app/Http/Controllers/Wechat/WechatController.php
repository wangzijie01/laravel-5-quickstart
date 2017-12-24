<?php
namespace App\Http\Controllers\Wechat;

use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use EasyWeChat\Kernel\Messages\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handler\TextMessageHandler;
use App\Handler\EventMessageHandler;

class WechatController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(TextMessageHandler::class,Message::TEXT);
        $app->server->push(EventMessageHandler::class,Message::EVENT);
        return $app->server->serve();
    }
}
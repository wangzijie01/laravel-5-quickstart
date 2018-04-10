<?php

namespace App\Handler;

use EasyWeChat\Kernel\Contracts\EventHandlerInterface;

/**
 * Class TextMessageHandler.
 */
class TextMessageHandler implements EventHandlerInterface
{
    /**
     * @param array $payload
     * @return string
     */
    public function handle($payload = [])
    {
        return json_encode($payload);
    }
}

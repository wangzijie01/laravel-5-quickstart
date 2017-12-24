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
     * @return bool|string|void
     */
    public function handle(array $payload = [])
    {
        return json_encode($payload);
    }
}

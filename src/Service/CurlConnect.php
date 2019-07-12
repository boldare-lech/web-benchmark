<?php

namespace App\Service;

use App\Service\CurlConnectInterface;


class CurlConnect implements CurlConnectInterface
{
    private const TIMEOUT = 30;

    /**
     * @inheritDoc
     */
    public function connect(string $url): void
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::TIMEOUT);

        $data = curl_exec($ch);
        curl_close($ch);
    }
}
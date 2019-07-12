<?php
declare(strict_types=1);

namespace App\Service;

use App\Service\CurlConnectInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class CurlConnect implements CurlConnectInterface
{
    private const TIMEOUT = 30;

    /**
     * @param string $url
     * @throws Exception
     */
    public function connect(string $url): void
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::TIMEOUT);

        $data = curl_exec($ch);
        curl_close($ch);

        if (!$data) {
            //@TODO message translations
            throw new \Exception("$url could not be reached.");
        }
    }
}
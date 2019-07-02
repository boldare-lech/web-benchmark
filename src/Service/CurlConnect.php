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
        $this->assertUrlIsValid($url);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::TIMEOUT);

        $data = curl_exec($ch);
        curl_close($ch);

        if (!$data) {
            throw new Exception("$url could not be reached.");
        }
    }

    /**
     * @param string $url
     */
    private function assertUrlIsValid(string $url): void
    {
        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception('Please provide a valid url');
        }
    }
}
<?php
namespace App\Service;

interface CurlConnectInterface
{
    /**
     * @param string $url
     */
    public function connect(string $url): void;
}
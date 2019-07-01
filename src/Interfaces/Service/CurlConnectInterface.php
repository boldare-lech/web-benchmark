<?php
namespace App\Interfaces\Service;

interface CurlConnectInterface
{
    /**
     * @param string $url
     */
    public function connect(string $url): void;
}
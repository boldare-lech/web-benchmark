<?php
namespace App\Service;

class NumberGenerator
{
    public function generateNumber()
    {
        return random_int(0, 100);;
    }
}
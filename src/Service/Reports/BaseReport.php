<?php


namespace App\Service\Reports;

use App\Entity\Website;
use App\Entity\WebsiteInterface;

class BaseReport
{
    public function create(WebsiteInterface $website)
    {
        die('ok_');
    }
}
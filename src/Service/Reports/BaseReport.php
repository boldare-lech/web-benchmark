<?php


namespace App\Service\Reports;

use App\Entity\WebsiteInterface;
use Symfony\Component\Console\Helper\Table;

class BaseReport
{
    public function createConsoleTable(WebsiteInterface $website): Table
    {

    }
}
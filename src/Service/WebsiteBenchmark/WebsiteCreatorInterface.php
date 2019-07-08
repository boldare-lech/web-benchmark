<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Entity\Website;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface WebsiteCreatorInterface
 * @package App\Service\WebsiteBenchmark
 */
interface WebsiteCreatorInterface
{
    /**
     * WebsiteCreatorInterface constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator);

    /**
     * @param array $arguments
     * @return WebsiteInterface
     */
    public function create(array $arguments): WebsiteInterface;
}
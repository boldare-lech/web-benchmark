<?php


namespace App\Service;


use Symfony\Component\Validator\Validator\RecursiveValidator;

class WebsiteCreator
{
    protected $validator;

    public function __construct(RecursiveValidator $validator)
    {
        $this->validator = $validator;
    }

}
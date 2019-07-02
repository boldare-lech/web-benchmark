<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Entity\Website;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class WebsiteCreator
{
    protected $validator;

    /**
     * @var WebsiteInterface
     */
    protected $website;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function create(array $arguments): WebsiteInterface
    {
        $urls = $this->makeUrlsArray($arguments);

        foreach ($urls as $url) {

            $website = new Website($url);

            if (isset($this->website)) {
                $this->website->addOtherWebsite($website);
            } else {
                $this->website = $website;
            }
        }

        return $this->website;
    }

    protected function makeUrlsArray(array $arguments): array
    {
        $urls = explode(
            WebsiteInterface::DELIMITER,
            $arguments[WebsiteInterface::OTHER_WEBSITES_FIELD]
        );

        array_unshift($urls, $arguments[WebsiteInterface::WEBSITE_FIELD]);

        return $urls;
    }





}
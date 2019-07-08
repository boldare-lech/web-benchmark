<?php


namespace App\Service\WebsiteBenchmark;

use App\Entity\WebsiteInterface;
use App\Entity\Website;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class WebsiteCreator
 * @package App\Service\WebsiteBenchmark
 */
class WebsiteCreator implements WebsiteCreatorInterface
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var WebsiteInterface
     */
    protected $website;

    /**
     * WebsiteCreator constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $arguments
     * @return WebsiteInterface
     */
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


    /**
     * @param array $arguments
     * @return array
     */
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
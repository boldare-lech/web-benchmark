<?php

namespace App\Entity;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use \Throwable;
use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Website
 */
class Website implements WebsiteInterface
{
    /**
     * @var string
     *
     * @Assert\Url(groups={"Default","main"})
     */
    protected $url;

    /**
     * @var WebsitesCollection
     *
     * @Assert\Count(
     *      min = 1,
     *      max = 5,
     *      minMessage = "You must specify at least one webiste to compare",
     *      maxMessage = "You cannot specify more than {{ limit }} websites to compare",
     *      groups={"main"}
     * )
     */
    protected $otherWebsites;

    /**
     * @var float
     */
    protected $startLoadingTime;

    /**
     * @var float
     */
    protected $finishLoadingTime;

    /**
     * @var Throwable
     */
    protected $exception;

    /**
     * @var ConstraintViolationListInterface
     */
    protected $violations;

    /**
     * @var DateTime
     */
    protected $date;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->date = new DateTime();
        $this->otherWebsites = new WebsitesCollection();
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     * @inheritDoc
     */
    public function setUrl(string $url): WebsiteInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOtherWebsites(): AbstractCollection
    {
        return $this->otherWebsites;
    }

    /**
     * @param WebsitesCollection $otherUrls Websites Collection
     *
     *
     * @return WebsiteInterface
     */
    public function setOtherWebsites(AbstractCollection $otherUrls): WebsiteInterface
    {
        $this->otherWebsites = $otherUrls;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStartLoadingTime(): ?float
    {
        return $this->startLoadingTime;
    }

    /**
     * @inheritDoc
     */
    public function setStartLoadingTime(float $startLoadingTime): WebsiteInterface
    {
        $this->startLoadingTime = $startLoadingTime;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFinishLoadingTime(): ?float
    {
        return $this->finishLoadingTime;
    }

    /**
     * @inheritDoc
     */
    public function setFinishLoadingTime(float $finishLoadingTime): WebsiteInterface
    {
        $this->finishLoadingTime = $finishLoadingTime;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOtherWebsite(WebsiteInterface $website): WebsiteInterface
    {
        $this->otherWebsites[] = $website;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setException(Throwable $exception): WebsiteInterface
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getException(): ?Throwable
    {
        return $this->exception;
    }

    /**
     * @inheritDoc
     */
    public function getViolations(): ?ConstraintViolationListInterface
    {
        return $this->violations;
    }

    /**
     * @inheritDoc
     */
    public function setViolations(ConstraintViolationListInterface $violations): WebsiteInterface
    {
        $this->violations = $violations;

        return $this;
    }



    /**
     * @inheritDoc
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }



    /*
     * @return array
     */
    public function getWebsitesArray(): array
    {
        assert($this->getOtherWebsites() instanceof WebsitesCollection);
        $array = $this->getOtherWebsites()->asArray();
        array_unshift($array, $this);

        return $array;
    }

    /**
     * @return float
     */
    public function countLoadTime(): ?float
    {
        return $this->getFinishLoadingTime() - $this->getStartLoadingTime();
    }

    /**
     * @return string
     */
    public function getLoadTime(): string
    {
        if ($this->isValid()) {
            return round($this->countLoadTime(), 4);
        }

        return '';
    }

    /**
     * @inheritDoc
     */
    public function diffLoadTime(WebsiteInterface $website): ?string
    {
        if (!$this->isValid()) {
            return null;
        }

        return round($this->countLoadTime() - $website->countLoadTime(), 4);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        if ($this->getViolations() || $this->getException()) {

            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function getErrors(): string
    {
        if ($this->getException()) {
            return $this->getException()->getMessage();
        }
        
        if ($this->getViolations()) {
            $error = '';
            foreach ($this->getViolations() as $violation) {
                assert($violation instanceof ConstraintViolationInterface);
                $error .= $violation->getMessage() . PHP_EOL;
            }
            
            return $error;
        }
        
        return '';
    }
}
<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Tender
 */
class Tender extends AbstractEntity
{
    /**
     * @var string
     */
    protected $headline = '';

    /**
     * @var string
     */
    protected $url = '';

    /**
     * @var \JWeiland\Tender\Domain\Model\TenderDepartment
     */
    protected $tenderdepartment;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $category;

    /**
     * @var \DateTime
     */
    protected $starttime;

    /**
     * @var \DateTime
     */
    protected $endtime;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $mediafiles;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @return string $headline
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     * @return Tender
     */
    public function setHeadline(string $headline): Tender
    {
        $this->headline = $headline;
        return $this;
    }

    /**
     * @return string $url
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Tender
     */
    public function setUrl(string $url): Tender
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return TenderDepartment $tenderdepartment
     */
    public function getTenderdepartment()
    {
        return $this->tenderdepartment;
    }

    /**
     * @param TenderDepartment $tenderdepartment
     * @return Tender
     */
    public function setTenderdepartment(TenderDepartment $tenderdepartment): Tender
    {
        $this->tenderdepartment = $tenderdepartment;
        return $this;
    }

    /**
     * @return ObjectStorage $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param ObjectStorage $category
     * @return Tender
     */
    public function setCategory(ObjectStorage $category): Tender
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return \DateTime $starttime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param \DateTime $starttime
     * @return Tender
     */
    public function setStarttime(\DateTime $starttime): Tender
    {
        $this->starttime = $starttime;
        return $this;
    }

    /**
     * @return \DateTime $endtime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * @param \DateTime $endtime
     * @return Tender
     */
    public function setEndtime(\DateTime $endtime): Tender
    {
        $this->endtime = $endtime;
        return $this;
    }

    /**
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Tender
     */
    public function setDescription(string $description): Tender
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Gets the mediafiles
     *
     * @return ObjectStorage
     */
    public function getMediafiles(): ObjectStorage
    {
        return $this->mediafiles;
    }

    /**
     * @param ObjectStorage $mediafiles
     * @return Tender
     */
    public function setMediafiles(ObjectStorage $mediafiles): Tender
    {
        $this->mediafiles = $mediafiles;
        return $this;
    }
}

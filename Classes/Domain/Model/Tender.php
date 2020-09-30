<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
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
    protected $categories;

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

    public function __construct()
    {
        $this->categories = new ObjectStorage();
        $this->mediafiles = new ObjectStorage();
    }

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): Tender
    {
        $this->headline = $headline;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Tender
    {
        $this->url = $url;
        return $this;
    }

    public function getTenderdepartment(): ?TenderDepartment
    {
        return $this->tenderdepartment;
    }

    public function setTenderdepartment(?TenderDepartment $tenderdepartment = null): Tender
    {
        $this->tenderdepartment = $tenderdepartment;
        return $this;
    }

    /**
     * @return ObjectStorage
     * @deprecated
     */
    public function getCategory(): ObjectStorage
    {
        trigger_error('getCategory() will be removed in tender 3.0.0. Please use getCategories() instead.', E_USER_DEPRECATED);
        return $this->categories;
    }

    /**
     * @param ObjectStorage $categories
     * @return $this
     * @deprecated
     */
    public function setCategory(ObjectStorage $categories): Tender
    {
        trigger_error('setCategory() will be removed in tender 3.0.0. Please use setCategories() instead.', E_USER_DEPRECATED);
        $this->categories = $categories;
        return $this;
    }

    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function setCategories(ObjectStorage $categories): Tender
    {
        $this->categories = $categories;
        return $this;
    }

    public function addCategory(Category $category)
    {
        $this->categories->attach($category);
    }

    public function removeCategory(Category $category)
    {
        $this->categories->detach($category);
    }

    public function getStarttime(): ?\DateTime
    {
        return $this->starttime;
    }

    public function setStarttime(?\DateTime $starttime): Tender
    {
        $this->starttime = $starttime;
        return $this;
    }

    public function getEndtime(): ?\DateTime
    {
        return $this->endtime;
    }

    public function setEndtime(?\DateTime $endtime): Tender
    {
        $this->endtime = $endtime;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Tender
    {
        $this->description = $description;
        return $this;
    }

    public function getMediafiles(): ObjectStorage
    {
        return $this->mediafiles;
    }

    public function setMediafiles(ObjectStorage $mediafiles): Tender
    {
        $this->mediafiles = $mediafiles;
        return $this;
    }

    public function addMediafile(FileReference $fileReference)
    {
        $this->mediafiles->attach($fileReference);
    }

    public function removeMediafile(FileReference $fileReference)
    {
        $this->mediafiles->detach($fileReference);
    }
}

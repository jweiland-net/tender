<?php
declare(strict_types=1);
namespace JWeiland\Tender\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Tender
 *
 * @package JWeiland\Tender\Domain\Model
 */
class Tender extends AbstractEntity
{
    /**
     * headline
     *
     * @var string
     */
    protected $headline = '';

    /**
     * url to the header
     *
     * @var string
     */
    protected $url = '';

    /**
     * tenderdepartment
     *
     * @var \JWeiland\Tender\Domain\Model\TenderDepartment
     */
    protected $tenderdepartment;

    /**
     * category
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $category;

    /**
     * starttime
     *
     * @var \DateTime
     */
    protected $starttime;

    /**
     * endtime
     *
     * @var \DateTime
     */
    protected $endtime;

    /**
     * mediafiles
     *
     * @var string
     */
    protected $mediafiles = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Returns the headline
     *
     * @return string $headline
     */
    public function getHeadline(): string
    {
        return $this->headline = '';
    }

    /**
     * Sets the headline
     *
     * @param string $headline
     * @return void
     */
    public function setHeadline(string $headline)
    {
        $this->headline = $headline;
    }

    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Returns the tenderdepartment
     *
     * @return TenderDepartment $tenderdepartment
     */
    public function getTenderdepartment()
    {
        return $this->tenderdepartment;
    }

    /**
     * Sets the tenderdepartment
     *
     * @param TenderDepartment $tenderdepartment
     * @return void
     */
    public function setTenderdepartment(TenderDepartment $tenderdepartment)
    {
        $this->tenderdepartment = $tenderdepartment;
    }

    /**
     * Returns the category
     *
     * @return ObjectStorage $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param ObjectStorage $category
     * @return void
     */
    public function setCategory(ObjectStorage $category)
    {
        $this->category = $category;
    }

    /**
     * Gets the starttime
     *
     * @return \DateTime $starttime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Sets the starttime
     *
     * @param \DateTime $starttime
     * @return void
     */
    public function setStarttime(\DateTime $starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * Gets the endtime
     *
     * @return \DateTime $endtime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Sets the endtime
     *
     * @param \DateTime $endtime
     * @return void
     */
    public function setEndtime(\DateTime $endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * Gets the description
     *
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Gets the mediafiles
     *
     * @return string
     */
    public function getMediafiles(): string
    {
        return $this->mediafiles;
    }

    /**
     * Sets the mediafiles
     *
     * @param string $mediafiles
     */
    public function setMediafiles(string $mediafiles)
    {
        $this->mediafiles = $mediafiles;
    }

    /**
     * Gets the mediafiles as array
     *
     * @return array|false
     */
    public function getMediafilesAsArray()
    {
        return explode(',', $this->mediafiles);
    }
}

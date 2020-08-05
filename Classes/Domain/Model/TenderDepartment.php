<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Domain\Model;

use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class TenderDepartment
 */
class TenderDepartment extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $organisationseinheit = '';

    /**
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TenderDepartment
     */
    public function setName(string $name): TenderDepartment
    {
        $this->name = $name;
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
     * @return TenderDepartment
     */
    public function setDescription(string $description): TenderDepartment
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrganisationseinheit(): array
    {
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheit($this->organisationseinheit);
    }

    /**
     * @param string $organisationseinheit
     * @return TenderDepartment
     */
    public function setOrganisationseinheit(string $organisationseinheit): TenderDepartment
    {
        $this->organisationseinheit = $organisationseinheit;
        return $this;
    }
}

<?php
declare(strict_types=1);
namespace JWeiland\Tender\Domain\Model;

/*
 * This file is part of the tender project.
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

use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class TenderDepartment
 *
 * @package JWeiland\Tender\Domain\Model
 */
class TenderDepartment extends AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * organisationseinheit
     *
     * @var string
     */
    protected $organisationseinheit = '';

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
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
     * Gets Organisationseinheit
     *
     * @return array
     */
    public function getOrganisationseinheit(): array
    {
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheit($this->organisationseinheit);
    }

    /**
     * Sets Organisationseinheit
     *
     * @param string $organisationseinheit
     * @return void
     */
    public function setOrganisationseinheit(string $organisationseinheit)
    {
        $this->organisationseinheit = $organisationseinheit;
    }
}

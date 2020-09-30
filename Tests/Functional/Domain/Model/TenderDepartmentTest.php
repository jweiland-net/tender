<?php

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Tests\Unit\Domain\Model;

use JWeiland\ServiceBw2\Domain\Repository\OrganisationseinheitenRepository;
use JWeiland\Tender\Domain\Model\TenderDepartment;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use Prophecy\Prophecy\ObjectProphecy;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Test case.
 */
class TenderDepartmentTest extends FunctionalTestCase
{
    /**
     * @var TenderDepartment
     */
    protected $subject;

    /**
     * @var ObjectManager|ObjectProphecy
     */
    protected $objectManagerProphecy;

    /**
     * @var OrganisationseinheitenRepository|ObjectProphecy
     */
    protected $organisationsEinheitenRepositoryProphecy;

    /**
     * @var string[]
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/service_bw2'
    ];

    public function setUp()
    {
        parent::setUp();

        $this->subject = new TenderDepartment();
        $this->objectManagerProphecy = $this->prophesize(ObjectManager::class);
        $this->organisationsEinheitenRepositoryProphecy = $this->prophesize(OrganisationseinheitenRepository::class);

        $this->objectManagerProphecy
            ->get(OrganisationseinheitenRepository::class)
            ->willReturn($this->organisationsEinheitenRepositoryProphecy->reveal());

        GeneralUtility::setSingletonInstance(ObjectManager::class, $this->objectManagerProphecy->reveal());
    }

    public function tearDown()
    {
        unset($this->subject);

        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameSetsName()
    {
        $this->subject->setName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameWithIntegerResultsInString()
    {
        $this->subject->setName(123);
        self::assertSame('123', $this->subject->getName());
    }

    /**
     * @test
     */
    public function setNameWithBooleanResultsInString()
    {
        $this->subject->setName(true);
        self::assertSame('1', $this->subject->getName());
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription()
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionWithIntegerResultsInString()
    {
        $this->subject->setDescription(123);
        self::assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        self::assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getOrganisationseinheitInitiallyReturnsEmptyString()
    {
        $this->organisationsEinheitenRepositoryProphecy
            ->getById(0)
            ->shouldBeCalled()
            ->willReturn([]);

        self::assertSame(
            [],
            $this->subject->getOrganisationseinheit()
        );
    }

    /**
     * @test
     */
    public function setOrganisationseinheitSetsOrganisationseinheit()
    {
        $this->organisationsEinheitenRepositoryProphecy
            ->getById(12)
            ->shouldBeCalled()
            ->willReturn([
                'uid' => 12
            ]);

        $this->subject->setOrganisationseinheit('12');

        self::assertSame(
            [
                'uid' => 12
            ],
            $this->subject->getOrganisationseinheit()
        );
    }
}

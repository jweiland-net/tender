<?php

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Tests\Unit\Domain\Model;

use JWeiland\Tender\Domain\Model\Tender;
use JWeiland\Tender\Domain\Model\TenderDepartment;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 */
class TenderTest extends UnitTestCase
{
    /**
     * @var Tender
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Tender();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getHeadlineInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getHeadline()
        );
    }

    /**
     * @test
     */
    public function setHeadlineSetsHeadline()
    {
        $this->subject->setHeadline('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getHeadline()
        );
    }

    /**
     * @test
     */
    public function setHeadlineWithIntegerResultsInString()
    {
        $this->subject->setHeadline(123);
        self::assertSame('123', $this->subject->getHeadline());
    }

    /**
     * @test
     */
    public function setHeadlineWithBooleanResultsInString()
    {
        $this->subject->setHeadline(true);
        self::assertSame('1', $this->subject->getHeadline());
    }

    /**
     * @test
     */
    public function getUrlInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlSetsUrl()
    {
        $this->subject->setUrl('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlWithIntegerResultsInString()
    {
        $this->subject->setUrl(123);
        self::assertSame('123', $this->subject->getUrl());
    }

    /**
     * @test
     */
    public function setUrlWithBooleanResultsInString()
    {
        $this->subject->setUrl(true);
        self::assertSame('1', $this->subject->getUrl());
    }

    /**
     * @test
     */
    public function getTenderdepartmentInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getTenderdepartment());
    }

    /**
     * @test
     */
    public function setTenderdepartmentSetsTenderdepartment()
    {
        $instance = new TenderDepartment();
        $this->subject->setTenderdepartment($instance);

        self::assertSame(
            $instance,
            $this->subject->getTenderdepartment()
        );
    }

    /**
     * @test
     */
    public function getCategoriesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function setCategoriesSetsCategories()
    {
        $object = new Category();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setCategories($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function addCategoryAddsOneCategory()
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setCategories($objectStorage);

        $object = new Category();
        $this->subject->addCategory($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function removeCategoryRemovesOneCategory()
    {
        $object = new Category();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setCategories($objectStorage);

        $this->subject->removeCategory($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function getStarttimeInitiallyReturnsNull()
    {
        self::assertNull(
            $this->subject->getStarttime()
        );
    }

    /**
     * @test
     */
    public function setStarttimeSetsStarttime()
    {
        $date = new \DateTime();
        $this->subject->setStarttime($date);

        self::assertSame(
            $date,
            $this->subject->getStarttime()
        );
    }

    /**
     * @test
     */
    public function getEndtimeInitiallyReturnsNull()
    {
        self::assertNull(
            $this->subject->getEndtime()
        );
    }

    /**
     * @test
     */
    public function setEndtimeSetsEndtime()
    {
        $date = new \DateTime();
        $this->subject->setEndtime($date);

        self::assertSame(
            $date,
            $this->subject->getEndtime()
        );
    }

    /**
     * @test
     */
    public function getMediafilesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getMediafiles()
        );
    }

    /**
     * @test
     */
    public function setMediafilesSetsMediafiles()
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setMediafiles($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getMediafiles()
        );
    }

    /**
     * @test
     */
    public function addMediafileAddsOneMediafile()
    {
        $objectStorage = new ObjectStorage();
        $this->subject->setMediafiles($objectStorage);

        $object = new FileReference();
        $this->subject->addMediafile($object);

        $objectStorage->attach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getMediafiles()
        );
    }

    /**
     * @test
     */
    public function removeMediafileRemovesOneMediafile()
    {
        $object = new FileReference();
        $objectStorage = new ObjectStorage();
        $objectStorage->attach($object);
        $this->subject->setMediafiles($objectStorage);

        $this->subject->removeMediafile($object);
        $objectStorage->detach($object);

        self::assertSame(
            $objectStorage,
            $this->subject->getMediafiles()
        );
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
}

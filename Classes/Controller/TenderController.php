<?php
declare(strict_types=1);
namespace JWeiland\Tender\Controller;

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

use JWeiland\Tender\Domain\Model\Tender;
use JWeiland\Tender\Domain\Repository\TenderRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Class TenderController
 *
 * @package JWeiland\Tender\Controller
 */
class TenderController extends ActionController
{
    /**
     * Allowed sorting fields
     *
     * @var array
     */
    private $ALLOWED_SORTING_FIELDS = [
        'starttime',
        'endtime',
        'headline'
    ];

    /**
     * Allowed sorting directions
     *
     * @var array
     */
    private $ALLOWED_SORTING_DIRECTIONS = [
        'desc' => QueryInterface::ORDER_DESCENDING,
        'asc' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * tenderRepository
     *
     * @var TenderRepository
     */
    protected $tenderRepository;

    /**
     * injects tenderRepository
     *
     * @param TenderRepository $tenderRepository
     * @return void
     */
    public function injectTenderRepository(TenderRepository $tenderRepository)
    {
        $this->tenderRepository = $tenderRepository;
    }


    /**
     * preprocessing of all actions
     *
     * @return void
     */
    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
        if (empty($this->settings['detailPid_WesEgovernment_Department'])) {
            $this->settings['detailPid_WesEgovernment_Department'] = null;
        }
    }

    /**
     *  init the list action
     *
     * @return void
     */
    public function initializeListAction()
    {
        // check if there are useCategories form flexfom and set it as array
        if (!is_array($this->settings['useCategories']) && '' !== $this->settings['useCategories']) {
            $this->settings['useCategories'] = explode(',', $this->settings['useCategories']);
        }
    }

    /**
     * action list
     *
     * @param string $sortby
     * @param string $direction
     * @return void
     */
    public function listAction($sortby = 'starttime', $direction = 'desc')
    {
        // check if there is a sorting set and set it to the reposetory
        if ($sortby
            && $direction
            && $this->ALLOWED_SORTING_DIRECTIONS[$direction]
            && in_array(
                $sortby,
                $this->ALLOWED_SORTING_FIELDS,
                true
            )
        ) {
            $this->tenderRepository->setDefaultOrderings(
                [
                    $sortby => $this->ALLOWED_SORTING_DIRECTIONS[$direction]
                ]
            );
            // now change the direction
            if ($direction === 'asc') {
                $direction = 'desc';
            } else {
                $direction = 'asc';
            }
            $this->view->assign('direction', $direction);
        }
        if ($this->settings['useCategories']) {
            $tenders = $this->tenderRepository->findByCategories($this->settings['useCategories']);
        } else {
            $tenders = $this->tenderRepository->findAll();
        }
        $this->view->assign('tenders', $tenders);
    }

    /**
     * init the show action
     *
     * @return void
     */
    public function initializeShowAction()
    {
        $this->settings['TYPO3_SITE_URL'] = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
    }

    /**
     * action show
     *
     * @param Tender $tender
     * @return void
     */
    public function showAction(Tender $tender)
    {
        $this->view->assign('tender', $tender);
    }
}

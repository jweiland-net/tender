<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Controller;

use JWeiland\Tender\Domain\Model\Tender;
use JWeiland\Tender\Domain\Repository\TenderRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Class TenderController
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
     */
    public function injectTenderRepository(TenderRepository $tenderRepository)
    {
        $this->tenderRepository = $tenderRepository;
    }

    /**
     * preprocessing of all actions
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
     */
    public function listAction(string $sortby = 'starttime', string $direction = 'desc')
    {
        // check if there is a sorting set and set it to the repository
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
     * @throws \UnexpectedValueException
     */
    public function initializeShowAction()
    {
        $this->settings['TYPO3_SITE_URL'] = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
    }

    /**
     * action show
     *
     * @param Tender $tender
     */
    public function showAction(Tender $tender)
    {
        $this->view->assign('tender', $tender);
    }
}

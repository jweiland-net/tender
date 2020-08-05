<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class LinkSplitterViewHelper
 */
class LinkSplitterViewHelper extends AbstractViewHelper
{
    /**
     * implements a viewHelper which splits link parameters into a fluid usable array
     *
     * @param string $parameter
     * @return array
     */
    public function render($parameter = ''): array
    {
        $parts = [];
        if (!empty($parameter)) {
            $parts = array_slice(GeneralUtility::trimExplode(' ', $parameter), 0, 2);
        }

        return $parts;
    }
}

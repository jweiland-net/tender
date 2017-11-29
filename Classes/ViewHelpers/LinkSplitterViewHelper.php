<?php
declare(strict_types=1);
namespace JWeiland\Tender\ViewHelpers;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class LinkSplitterViewHelper
 *
 * @package JWeiland\Tender\ViewHelpers
 */
class LinkSplitterViewHelper extends AbstractViewHelper
{
    /**
     * implements a vievHelper which splits link parameters into a fluid usable array
     *
     * @param string $parameter
     * @return array
     */
    public function render($parameter = '')
    {
        $parts = [];
        if (!empty($parameter)) {
            $parts = array_slice(GeneralUtility::trimExplode(' ', $parameter), 0, 2);
        }

        return $parts;
    }
}

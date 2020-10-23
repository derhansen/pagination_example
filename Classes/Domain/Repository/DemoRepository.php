<?php

namespace Derhansen\PaginationExample\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * Class DemoRepository
 */
class DemoRepository extends \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
{
    public function initializeObject()
    {
        $this->defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $this->defaultQuerySettings->setRespectStoragePage(false);
    }
}

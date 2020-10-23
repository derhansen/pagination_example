<?php

namespace Derhansen\PaginationExample\Pagination;

use TYPO3\CMS\Core\Pagination\PaginationInterface;
use TYPO3\CMS\Core\Pagination\PaginatorInterface;

/**
 * Class CustomPagination
 */
class CustomPagination implements PaginationInterface
{
    /**
     * @var PaginatorInterface
     */
    protected $paginator;

    /**
     * @var int
     */
    protected $maximumNumberOfPages;

    public function __construct(PaginatorInterface $paginator, int $maximumNumberOfPages = 10)
    {
        $this->paginator = $paginator;
        $this->maximumNumberOfPages = $maximumNumberOfPages;
    }

    public function getPreviousPageNumber(): ?int
    {
        $previousPage = $this->paginator->getCurrentPageNumber() - 1;

        if ($previousPage > $this->paginator->getNumberOfPages()) {
            return null;
        }

        return $previousPage >= $this->getFirstPageNumber()
            ? $previousPage
            : null
            ;
    }

    public function getNextPageNumber(): ?int
    {
        $nextPage = $this->paginator->getCurrentPageNumber() + 1;

        return $nextPage <= $this->paginator->getNumberOfPages()
            ? $nextPage
            : null
            ;
    }

    public function getFirstPageNumber(): int
    {
        return 1;
    }

    public function getLastPageNumber(): int
    {
        return $this->paginator->getNumberOfPages();
    }

    public function getStartRecordNumber(): int
    {
        if ($this->paginator->getCurrentPageNumber() > $this->paginator->getNumberOfPages()) {
            return 0;
        }

        return $this->paginator->getKeyOfFirstPaginatedItem() + 1;
    }

    public function getEndRecordNumber(): int
    {
        if ($this->paginator->getCurrentPageNumber() > $this->paginator->getNumberOfPages()) {
            return 0;
        }

        return $this->paginator->getKeyOfLastPaginatedItem() + 1;
    }

    public function getPages(): array
    {
        $maximumNumberOfLinks = $this->maximumNumberOfPages;
        if ($maximumNumberOfLinks > $this->paginator->getNumberOfPages()) {
            $maximumNumberOfLinks = $this->paginator->getNumberOfPages();
        }
        $delta = floor($maximumNumberOfLinks / 2);
        $displayRangeStart = $this->paginator->getCurrentPageNumber() - $delta;
        $displayRangeEnd = $this->paginator->getCurrentPageNumber() + $delta - ($maximumNumberOfLinks % 2 === 0 ? 1 : 0);
        if ($displayRangeStart < 1) {
            $displayRangeEnd -= $displayRangeStart - 1;
        }
        if ($displayRangeEnd > $this->paginator->getNumberOfPages()) {
            $displayRangeStart -= $displayRangeEnd - $this->paginator->getNumberOfPages();
        }
        $displayRangeStart = (int)max($displayRangeStart, 1);
        $displayRangeEnd = (int)min($displayRangeEnd, $this->paginator->getNumberOfPages());

        $pages = [];
        for ($i = $displayRangeStart; $i <= $displayRangeEnd; $i++) {
            $pages[] = ['number' => $i, 'isCurrent' => $i === $this->paginator->getCurrentPageNumber()];
        }

        return $pages;
    }
}
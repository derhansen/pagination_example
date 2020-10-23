<?php

namespace Derhansen\PaginationExample\Controller;

use Derhansen\PaginationExample\Domain\Repository\DemoRepository;
use Derhansen\PaginationExample\Pagination\CustomPagination;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

/**
 * Class DemoController
 */
class DemoController extends ActionController
{
    /**
     * @var DemoRepository
     */
    protected $demoRespository;

    /**
     * @param DemoRepository $demoRepository
     */
    public function __construct(DemoRepository $demoRepository)
    {
        $this->demoRespository = $demoRepository;
    }

    /**
     * Action which renders the pagination with the f:widget.paginate widget removed in v11
     */
    public function widgetAction()
    {
        $this->view->assignMultiple([
            'items' => $this->demoRespository->findAll()
        ]);
    }

    /**
     * Action which paginates using the SimplePagination class
     *
     * @param int $currentPage
     */
    public function controllerAction(int $currentPage = 1)
    {
        $items = $this->demoRespository->findAll();

        $paginator = new QueryResultPaginator($items, $currentPage);
        $pagination = new SimplePagination($paginator);

        $this->view->assignMultiple([
            'paginator' => $paginator,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Action which paginates using the SimplePagination class
     *
     * @param int $currentPage
     */
    public function customAction(int $currentPage = 1)
    {
        $items = $this->demoRespository->findAll();

        // We set items per page to 1 below
        $paginator = new QueryResultPaginator($items, $currentPage, 1);

        // And we use the custom pagination with a max. amount of 10 pages
        $pagination = new CustomPagination($paginator, 10);

        $this->view->assignMultiple([
            'paginator' => $paginator,
            'pagination' => $pagination,
        ]);
    }
}

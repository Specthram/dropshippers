<?php
/**
 * Created by PhpStorm.
 * User: SKYNET
 * Date: 17/10/2016
 * Time: 19:28
 */

namespace Dropshippers\APIBundle\Services;


use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class HelperService
{

    /**
     * HelperService constructor.
     */
    public function __construct()
    {
    }

    public function getResultOfArrayPaginated($results, $maxPerPage, $numPage){

        $pager = new PagerFanta(new ArrayAdapter($results));

        try {
            $productsFinal = $pager
                ->setMaxPerPage($maxPerPage)
                ->setCurrentPage($numPage)
                ->getCurrentPageResults()
            ;
        } catch (NotValidCurrentPageException $e) {
            throw new AccessDeniedHttpException('Cette page n\'existe pas.');
        }

        if($pager->haveToPaginate()){
            $resultOfPagination['currentPage'] = $pager->getCurrentPage();
            $resultOfPagination['firstPage'] = 1;
            $resultOfPagination['lastPage'] = $pager->getNbPages();
            $resultOfPagination['previousPage'] = $pager->hasPreviousPage() ? $pager->getPreviousPage() : null;
            $resultOfPagination['nextPage'] = $pager->hasNextPage() ? $pager->getNextPage() : null;
            $resultOfPagination['nombre_de_page'] = $pager->getNbPages();
            $resultOfPagination['nombre_de_resultats'] = $pager->getNbResults();
        }else{
            $resultOfPagination['infos'] = null;
        }

        return array(
            'products' => $productsFinal,
            'pagination' => $resultOfPagination
        );
    }
}
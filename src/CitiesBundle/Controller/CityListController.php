<?php

namespace CitiesBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CitiesBundle\Service\PaginationService;

class CityListController extends Controller
{
    /**
     * @var PaginationService
     */
    private $paginationService;

    public function __construct(PaginationService $paginationService)
    {
        $this->paginationService = $paginationService;
    }

    /**
     * @Route("/", name="welcomePage")
     * @Template("@Cities/CityView/welcomePage.html.twig")
     */
    public function welcomePageAction()
    {
    }

    /**
     * @Route("/citiesList", name="citiesList")
     * @Template("@Cities/CityView/citiesList.html.twig")
     */
    public function citiesListAction(Request $request)
    {
      $cityFilter = $request->query->get('cityFilter');
      $viewOrder = $request->query->get('viewOrder');
      $page = $request->query->get('page') ?? 1;

      $paginator = $this->paginationService->paginate($page,10, $viewOrder, trim($cityFilter));

      $rows = [];
      foreach ($paginator as $data){
          $cityName = $data->getName();
          $countryName = $data->getCityFKey()->getName();
          $languages = [];

          $languagesRepo = $data->getCityFKey()->getCountryLanguageCode();
          foreach($languagesRepo as $language){
            $languages[] = $language->getLanguage();
          }

          $rows[] = ['cityName' => $cityName, 'countryName' => $countryName, 'languages' => implode(',', $languages)];
      }

      return array (
        'rows' => $rows,
        'cityFilter'=> $cityFilter,
        'viewOrder' => $viewOrder,
        'maxPages' => ceil($paginator->count() / 10),
        'page' => $page,
      );


    }
}

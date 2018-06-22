<?php
namespace CitiesBundle\Service;

use CitiesBundle\Entity\City;
use CitiesBundle\Repository\CityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;


/**
 * Created by PhpStorm.
 * User: Akki
 * Date: 29.05.2018
 * Time: 22:49
 */

class PaginationService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var cityRepository
     */
    private $cityRepository;

    /**
     * PaginationService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->cityRepository = $this->em->getRepository(City::class);
    }

    /**
     * @param int $page
     * @param int $limit
     * @param string $order
     * @param string $filter
     * @return Paginator
     */
    public function paginate($page = 1, $limit = 10, $order = 'ASC', $filter = '')
    {
        $qb = $this->cityRepository->createQueryBuilder('m')
            ->where('m.name LIKE :filter')
            ->orderBy('m.name', $order)
            ->setParameter('filter', $filter . '%');

        $query =  $qb->getQuery();

        $paginator = new Paginator($query);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit);

        return $paginator;
    }



}
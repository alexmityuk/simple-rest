<?php

namespace App\Core\Route\Model;

use App\Core\HydratorInterface;
use App\Core\Model;
use App\Core\Route\Entity\Route;

/**
 * Class RouteModel
 *
 * @package App\Core\Route\Model
 */
class RouteModel implements Model
{
    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @param HydratorInterface $hydrator
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return Route[]
     */
    public function findAll()
    {
        $rawRoutes = include $_SERVER['DOCUMENT_ROOT'] . DS . 'app/Http/Routes/Routes.php';

        if (!is_array($rawRoutes)) {
            return [];
        }

        return $this->hydrator->hydrateMany($rawRoutes);
    }

    /**
     * @param $id
     * @return Route|null
     */
    public function findById($id)
    {
        $routes = $this->findAll();

        return $routes[$id] ?? null;
    }
}

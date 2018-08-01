<?php

namespace App\Core\Route\Hydrator;

use App\Core\HydratorInterface;
use App\Core\Route\Entity\Route;

/**
 * Class RouteHydrator
 *
 * @package App\Core\Route\Hydrator
 */
class RouteHydrator implements HydratorInterface
{
    /**
     * @param $item
     * @return Route
     */
    public function hydrateOne($item)
    {
        return new Route($item);
    }

    /**
     * @param array $data
     * @return Route[]
     */
    public function hydrateMany(array $data)
    {
        return array_map(function ($item) {
            return $this->hydrateOne($item);
        }, $data);
    }
}

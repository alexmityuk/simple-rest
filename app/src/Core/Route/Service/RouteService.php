<?php

namespace App\Core\Route\Service;

use App\Core\Route\Model\RouteModel;
use App\Core\Route\Request;

/**
 * Class RouteService
 *
 * @package App\Core\Route\Service
 */
class RouteService
{
    /**
     * @var RouteModel
     */
    private $routeModel;

    /**
     * @var Request
     */
    private $request;

    /**
     * RouteService constructor.
     *
     * @param RouteModel $routeModel
     * @param Request $request
     */
    public function __construct(RouteModel $routeModel, Request $request)
    {
        $this->routeModel = $routeModel;
        $this->request = $request;
    }

    /**
     * @param string $uri
     * @return \App\Core\Route\Entity\Route|null
     */
    public function getRouteByUri($uri = '')
    {
        if (!$uri) {
            $uri = $this->request->getRequestUri();
        }

        if ($uri === '/') {
            return $this->routeModel->findById('index');
        }

        $routeParts = array_values(array_filter(explode('/', $uri)));

        if (!count($routeParts) || !$this->routeModel->findById($routeParts[0])) {
            return $this->routeModel->findById('routeNotFound');
        }

        if (isset($routeParts[1])) {
            $route = $this->routeModel->findById($routeParts[0] . '/{id}');
            $route->setRequestParams([
                $routeParts[1]
            ]);

            return $route;
        }

        return $this->routeModel->findById($routeParts[0]);
    }
}

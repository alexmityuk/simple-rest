<?php

namespace App\Core;

use App\Api\Auth\Auth;
use App\Core\Route\Entity\Route;
use App\Core\Route\Request;
use App\Core\Route\Service\RouteService;

/**
 * Class Application
 *
 * @package App\Core
 */
class Application
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Auth
     */
    private $auth;

    /**
     * @var RouteService
     */
    private $routeService;

    /**
     * Application constructor.
     * @param Request $request
     * @param Auth $auth
     * @param RouteService $routeService
     */
    public function __construct(Request $request, Auth $auth, RouteService $routeService)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->routeService = $routeService;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->dispatch();
    }

    /**
     * @param string $uri
     * @return mixed
     */
    private function dispatch($uri = '')
    {
        $route = $this->routeService->getRouteByUri($uri);

        if ($route->isAuthEnabled()) {
            $this->auth->checkLogged();
        }

        if (!$this->request->requestMethodEqualsTo($route->getRequestType()) && $uri !== 'methodNotAllowed') {
            return $this->dispatch('methodNotAllowed');
        }

        $controllerName = NS . CONTROLLERS_NAMESPACE . NS . $route->getController();
        $actionName = $route->getAction();

        if (method_exists($controllerName, $actionName)) {
            /** @var Controller $controller */
            $controller = new $controllerName($this->auth, new View());
            $this->attachModelToController($route, $controller);

            return call_user_func_array([$controller, $actionName], $route->getRequestParams());
        }

        return $this->dispatch('error');
    }

    /**
     * @param Route $route
     * @param Model $model
     */
    private function attachHydratorToModel(Route $route, Model $model)
    {
        $hydratorPath = NS . API_NAMESPACE . NS . $route->getHydrator();
        $model->setHydrator(new $hydratorPath());
    }

    /**
     * @param Route $route
     * @param Controller $controller
     */
    private function attachModelToController(Route $route, Controller $controller)
    {
        $modelPath = NS . API_NAMESPACE . NS . $route->getModel();
        if (class_exists($modelPath)) {
            $model = new $modelPath();
            $controller->setModel($model);
            $this->attachHydratorToModel($route, $model);
        }
    }
}

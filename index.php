<?php

define('DS', DIRECTORY_SEPARATOR);

require_once 'config' . DS . 'config.php';
require_once 'autoload' . DS . 'autoloader.php';

use App\Core\Route\Request;
use App\Api\Auth\Auth;
use App\Core\Application;
use App\Api\User\Service\UserService;
use App\Api\User\Model\UserModel;
use App\Api\User\Hydrator\UserHydrator;

use App\Core\Route\Service\RouteService;
use App\Core\Route\Model\RouteModel;
use App\Core\Route\Hydrator\RouteHydrator;

$request = new Request();
$userModel = new UserModel();
$userModel->setHydrator(new UserHydrator());
$userService = new UserService($userModel);

$routeModel = new RouteModel();
$routeModel->setHydrator(new RouteHydrator());
$routeService = new RouteService($routeModel, $request);

$application = new Application(
    $request,
    new Auth($userService),
    $routeService
);
$application->run();

exit(0);

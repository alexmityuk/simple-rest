<?php

return [
    'index' => [
        'controller' => 'Index\IndexController',
        'action' => 'index',
        'requestType' => 'get',
    ],
    'products' => [
        'controller' => 'Product\ProductController',
        'action' => 'index',
        'requestType' => 'get',
        'options' => [
            'model' => 'Product\Model\ProductModel',
            'hydrator' => 'Product\Hydrator\ProductHydrator',
            'auth' => true,
        ],
    ],
    'products/{id}' => [
        'controller' => 'Product\ProductController',
        'action' => 'show',
        'requestType' => 'get',
        'options' => [
            'model' => 'Product\Model\ProductModel',
            'hydrator' => 'Product\Hydrator\ProductHydrator',
            'auth' => true,
        ],
    ],
    'routeNotFound' => [
        'controller' => 'Error\ErrorController',
        'action' => 'routeNotFound',
        'requestType' => 'get',
    ],
    'error' => [
        'controller' => 'Error\ErrorController',
        'action' => 'index',
        'requestType' => 'get',
    ],
    'methodNotAllowed' => [
        'controller' => 'Error\ErrorController',
        'action' => 'methodNotAllowed',
        'requestType' => 'get',
    ],
    'login' => [
        'controller' => 'Auth\AuthController',
        'action' => 'login',
        'requestType' => 'get',
    ],
    'logout' => [
        'controller' => 'Auth\AuthController',
        'action' => 'logout',
        'requestType' => 'get',
    ],
];

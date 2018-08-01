<?php

return [
    'index' => [
        'namespace' => 'Index\IndexController',
        'type' => 'get',
        'action' => 'index',

        'controller' => 'Index\IndexController',
        'requestType' => 'get',

    ],
    'products' => [
        'namespace' => 'Product\ProductController',
        'type' => 'get',
        'action' => 'index',
        'model' => 'Product\Model\ProductModel',
        'hydrator' => 'Product\Hydrator\ProductHydrator',
        'auth' => true,

        'controller' => 'Product\ProductController',
        'requestType' => 'get',
        'options' => [
            'model' => 'Product\Model\ProductModel',
            'hydrator' => 'Product\Hydrator\ProductHydrator',
            'auth' => true,
        ],
    ],
    'products/{id}' => [
        'namespace' => 'Product\ProductController',
        'type' => 'get',
        'action' => 'show',
        'model' => 'Product\Model\ProductModel',
        'hydrator' => 'Product\Hydrator\ProductHydrator',
        'auth' => true,

        'controller' => 'Product\ProductController',
        'requestType' => 'get',
        'options' => [
            'model' => 'Product\Model\ProductModel',
            'hydrator' => 'Product\Hydrator\ProductHydrator',
            'auth' => true,
        ],
    ],
    'routeNotFound' => [
        'namespace' => 'Error\ErrorController',
        'type' => 'get',
        'action' => 'routeNotFound',

        'controller' => 'Error\ErrorController',
        'requestType' => 'get',
    ],
    'error' => [
        'namespace' => 'Error\ErrorController',
        'type' => 'get',
        'action' => 'index',

        'controller' => 'Error\ErrorController',
        'requestType' => 'get',
    ],
    'methodNotAllowed' => [
        'namespace' => 'Error\ErrorController',
        'type' => 'get',
        'action' => 'methodNotAllowed',

        'controller' => 'Error\ErrorController',
        'requestType' => 'get',
    ],
    'login' => [
        'namespace' => 'Auth\AuthController',
        'type' => 'get',
        'action' => 'login',

        'controller' => 'Auth\AuthController',
        'requestType' => 'get',
    ],
    'logout' => [
        'namespace' => 'Auth\AuthController',
        'type' => 'get',
        'action' => 'logout',

        'controller' => 'Auth\AuthController',
        'requestType' => 'get',
    ],
];

<?php

namespace App\Core\Route\Entity;

/**
 * Class Route
 *
 * @package App\Core\Route\Entity
 */
class Route
{
    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $requestType;

    /**
     * @var string
     */
    private $action;

    /**
     * @var RouteOptions
     */
    private $options;

    /**
     * @var array
     */
    private $requestParams;

    /**
     * Route constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->controller = $data['controller'] ?? 'Index\IndexController';
        $this->requestType = $data['requestType'] ?? 'get';
        $this->action = $data['action'] ?? 'index';
        $this->options = isset($data['options']) ? new RouteOptions($data['options']) : [];
        $this->requestParams = [];
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return $this->requestType;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getRequestParams(): array
    {
        return $this->requestParams;
    }

    /**
     * @param array $requestParams
     */
    public function setRequestParams(array $requestParams)
    {
        $this->requestParams = array_merge($this->requestParams, $requestParams);
    }

    /**
     * @return bool
     */
    public function isAuthEnabled()
    {
        return $this->options && $this->options->isAuth();
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->options ? $this->options->getModel() : '';
    }

    /**
     * @return string
     */
    public function getHydrator()
    {
        return $this->options ? $this->options->getHydrator() : '';
    }
}

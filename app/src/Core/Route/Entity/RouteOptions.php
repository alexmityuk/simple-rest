<?php

namespace App\Core\Route\Entity;

/**
 * Class RouteOptions
 *
 * @package App\Core\Route\Entity
 */
class RouteOptions
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $hydrator;

    /**
     * @var bool
     */
    private $auth;

    /**
     * RouteOptions constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->model = $data['model'] ?? null;
        $this->hydrator = $data['hydrator']  ?? null;
        $this->auth = $data['auth'] ?? null;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getHydrator(): string
    {
        return $this->hydrator;
    }

    /**
     * @return bool
     */
    public function isAuth(): bool
    {
        return $this->auth;
    }
}

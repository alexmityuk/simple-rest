<?php

namespace App\Core\Route;

/**
 * Class Request
 *
 * @package App\Core\Route
 */
class Request
{
    /**
     * @return string|bool
     */
    public function getRequestUri()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return (string) $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string $method
     * @return bool
     */
    public function requestMethodEqualsTo(string $method)
    {
        return strcasecmp($this->getRequestMethod(), $method) == 0;
    }
}

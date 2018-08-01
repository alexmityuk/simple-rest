<?php

namespace App\Core;

use App\Api\Auth\Auth;

/**
 * Class Controller
 *
 * @package Http\Controllers
 */
class Controller
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @var View
     */
    private $view;

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * Controller constructor.
     *
     * @param Auth $auth
     * @param View $view
     */
    public function __construct(Auth $auth, View $view)
    {
        $this->auth = $auth;
        $this->view = $view;
    }

    public function redirect($url)
    {
        header("Location:$url", true, 301);
        exit;
    }

    /**
     * @return Auth
     */
    public function getAuth(): Auth
    {
        return $this->auth;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->view;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }
}

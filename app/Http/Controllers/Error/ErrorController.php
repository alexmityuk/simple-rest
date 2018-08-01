<?php

namespace App\Http\Controllers\Error;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        header("HTTP/1.0 500 Internal Server Error");
        $this->getView()->render('error/500.view.php', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
        ]);
    }

    public function routeNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        $this->getView()->render('error/404.view.php', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
        ]);
    }

    public function methodNotAllowed()
    {
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method not allowed";
        exit;
    }
}
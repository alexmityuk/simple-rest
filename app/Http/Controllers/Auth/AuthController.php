<?php

namespace App\Http\Controllers\Auth;

use App\Core\Controller;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{
    /**
     * @return void
     */
    public function login()
    {
        $this->getAuth()->checkLogged();

        $this->redirect('/');
    }

    /**
     * @return void
     */
    public function logout()
    {
        $this->getAuth()->logout();

        header('HTTP/1.1 401 Unauthorized');
        header('status: 401 Unauthorized');

        $this->getView()->render('', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
        ]);
    }
}

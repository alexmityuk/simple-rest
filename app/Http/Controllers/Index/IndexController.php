<?php

namespace App\Http\Controllers\Index;

use App\Core\Controller;

/**
 * Class IndexController
 * @package App\Http\Controllers\Index
 */
class IndexController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $this->getView()->render('index/index.view.php', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
        ]);
    }
}

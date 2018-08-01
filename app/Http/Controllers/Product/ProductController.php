<?php

namespace App\Http\Controllers\Product;

use App\Core\Controller;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Product
 */
class ProductController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $this->getView()->render('product/index.view.php', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
            'products' => $this->getModel()->findAll(),
        ]);
    }

    /**
     * @param int $id
     */
    public function show(int $id)
    {
        $this->getView()->render('product/product.view.php', 'app.view.php', [
            'user' => $this->getAuth()->getUserName(),
            'product' => $this->getModel()->findById($id),
        ]);
    }
}
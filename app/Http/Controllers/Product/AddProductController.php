<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Domain\Product\CommandHandler\AddProductCommandHandler;
use Domain\Product\Commands\AddProduct;
use Illuminate\Http\Request;

/**
 * Class AddProductController
 * @package App\Http\Controllers
 */
class AddProductController extends Controller
{
    /**
     * @var AddProductCommandHandler
     */
    private $addProductCommandHandler;

    public function __construct(AddProductCommandHandler $addProductCommandHandler)
    {
        $this->addProductCommandHandler = $addProductCommandHandler;
    }

    /**
     * @param Request $request
     */
    public function add(Request $request)
    {
        $addProduct = new AddProduct($request->get('product_code'), $request->get('product_name'));
        $this->addProductCommandHandler->handle($addProduct);
    }
}
<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $product;

    public function __construct(ProductRepository $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return request
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->product->all();
        }
        else {
            return 'dasdsd';
        }
    }

}

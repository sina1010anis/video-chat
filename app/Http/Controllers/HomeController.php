<?php

namespace App\Http\Controllers;

use App\Helper\Pattern\Adapter\Adapter;
use App\Helper\Pattern\Adapter\Item_1;
use App\Helper\Pattern\Adapter\Item_2;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function upload(Request $request)
    {
        return 'good';
    }
    public function test()
    {
        $adapter = new Adapter(new Item_2());
        $adapter->view();
        echo '<br>';
        $adapter->bind();
    }
}

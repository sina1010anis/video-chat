<?php

namespace App\Http\Controllers;

use App\Helper\Pattern\Adapter\Adapter;
use App\Helper\Pattern\Adapter\Item_1;
use App\Helper\Pattern\Adapter\Item_2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use phpDocumentor\Reflection\Types\Collection;

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
        $datas = collect([
            ['name' => 'sina'],
            ['name' => 'arash']
        ])->map(function ($item){
            return $item['name'];
        });
        if (\request()->has('email')){
            return \request()->email;
            //Mail::to(\request()->email)->send(new TestMail($datas));
        }
/*        return collect(
            User::all()
        )->map(function ($item){
            if($item->id == 1){
                return $item;
            }
        })->reject(function ($name){
            return empty($name);
        });*/
    }
}

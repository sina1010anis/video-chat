<?php

namespace App\Http\Controllers;

use App\Helper\Pattern\Adapter\Adapter;
use App\Helper\Pattern\Adapter\Item_1;
use App\Helper\Pattern\Adapter\Item_2;
use App\Http\Requests\CodeRequest;
use App\Models\User;
use App\Repository\Token\ChackSessionClass;
use App\Repository\Token\NewToken;
use App\Repository\Token\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use phpDocumentor\Reflection\Types\Collection;
use Psy\Util\Str;

class HomeController extends Controller
{
    protected $token;
    public function __construct(Token $token)
    {
        $this->middleware('auth');
        $this->token = $token;
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
/*        $datas = collect([
            ['name' => 'sina'],
            ['name' => 'arash']
        ])->map(function ($item){
            return $item['name'];
        });
        if (\request()->has('email')){
            return \request()->email;
            //Mail::to(\request()->email)->send(new TestMail($datas));
        }*/
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

    public function viewBtn()
    {
        return view('welcome');
    }
    // این متد سیشن رو میسازه و یک ایمل برای کاربر تحت همان سیشن میفرسته
    public function setSession()
    {
        return $this->token::make('NewToken')
            ->code(10)
            ->sendMail(auth()->user()->email)
            ->setSession()
            ->hasSession('formSession');
    }

    public function formSession()
    {
        return view('home');
    }
    // در این متد برسی میشه ایا سیشن مورد نظر هستش یا نه و بعد از این کار برسی میشه ایا قبل 60 ثانیه این کد وارد شده یا قبل 60 ثانیه
    public function checkSession(CodeRequest $request)
    {
        return $this->token::make('CheckSession')
            ->hasSession()
            ->checkSession($request->code , 'viewBtn');
    }
}

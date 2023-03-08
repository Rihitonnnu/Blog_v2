<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     *  @var string $route
     */
    private $route = 'login';


    protected function redirectTo($request)
    {
        return route($this->route);
        // // 未認証の場合にログイン画面へリダイレクトさせる処理
        // if (!$request->expectsJson()) {
        //     if (Route::is('admin.*')) {
        //         return route($this->adminRoute);
        //     } else {
        //         return route($this->userRoute);
        //     }
        // }
    }
}

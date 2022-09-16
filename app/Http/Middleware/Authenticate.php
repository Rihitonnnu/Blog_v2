<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected $user_route='user.login';
    protected $admin_route='admin.login';

    protected function redirectTo($request)
    {
        // 未認証の場合にログイン画面へリダイレクトさせる処理
        if (! $request->expectsJson()) {
            if(Route::is('admin.*')){
                return route($this->admin_route);
            }
            else{
                return route($this->user_route);
            }
        }
    }
}

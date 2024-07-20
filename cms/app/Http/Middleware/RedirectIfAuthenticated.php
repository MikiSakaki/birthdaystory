<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // ユーザーがログインしているかどうかを確認
            if (Auth::guard($guard)->check()) {
                // ログインしている場合は、create.form ルートにリダイレクト
                // そして、user_id をセッションに保存して引き継ぐ
                return redirect()->route('create.form')->with('user_id', auth()->id());
            }
        }

        return $next($request);
    }
}

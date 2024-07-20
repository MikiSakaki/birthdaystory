<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| アプリケーションのウェブルートを登録する場所です。これらのルートは
| RouteServiceProvider によって読み込まれ、すべてが "web" ミドルウェアグループに
| 割り当てられます。
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Registerページへのルート
Route::get('/register', function () {
    return view('register');
});

// TOPページからregisterボタン→registerページへのルート
//Route::middleware('guest')->group(function () {
  //  Route::get('register', [RegisteredUserController::class, 'create'])
    //    ->name('register');

//    Route::post('register', [RegisteredUserController::class, 'store']);
//});



// 絵本作成ページのルート
Route::get('/create', [BabyController::class, 'create'])->name('create.form');
Route::post('/create', [BabyController::class, 'store'])->name('create.store');

// 赤ちゃん情報フォームのルート
Route::get('/baby/create', function () {
    return view('baby.create');
})->name('baby.create.form');

Route::post('/baby', [BabyController::class, 'store'])->name('baby.store');

// プロフィールページのルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ログインページのルートを設定
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login'); // 修正箇所: ログインページのビューを表示
    })->name('login')->middleware('guest');

    Route::post('/login', function () {
        // ログイン処理
        // ログイン後にRedirectIfAuthenticated ミドルウェアがリダイレクトする
    })->middleware('guest');
});

// create ページのルート
// 修正: このセクションは既に定義されているため、重複を避けるためにコメントアウトします。
// Route::get('/create', [BabyController::class, 'create'])->name('create.form');
// Route::post('/create', [BabyController::class, 'store'])->name('create.store');




require __DIR__.'/auth.php';

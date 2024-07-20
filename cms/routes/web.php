<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PictureBookController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\LoginController; // 追加

Route::get('/', function () {
    return view('welcome');
});

// ログインルートの設定
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // 修正
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // 追加
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // 追加

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    Log::info('Registration request received.', ['request' => $request->all()]);
    Log::info('CSRF Token:', ['token' => $request->header('X-CSRF-TOKEN')]);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    Log::info('Validation passed.');

    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        Log::info('User successfully registered and logged in.', ['user' => $user]);

        return redirect()->route('character.new');
    } catch (Exception $e) {
        Log::error('Error during registration: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.']);
    }
});

// Characterページ関連のルート
Route::middleware(['auth'])->group(function () {
    Route::get('/character/new', [CharacterController::class, 'new'])->name('character.new');
    Route::get('/character/{id}', [CharacterController::class, 'show'])->name('character.show');
    Route::get('/character/form', [CharacterController::class, 'showForm'])->name('character.form'); // フォーム表示用のルート
    Route::post('/character/save', [CharacterController::class, 'save'])->name('character.save'); // 保存用のルート
});

// 絵本を作成するページに遷移するためのルート
Route::get('/create', [PictureBookController::class, 'create'])->name('create');
Route::post('/save-story', [PictureBookController::class, 'saveStory'])->name('save.story'); // saveStoryへのルート
Route::get('/get-story', [PictureBookController::class, 'getStory'])->name('getStory');
Route::post('/update-story', [PictureBookController::class, 'updateStory'])->name('updateStory');

// サンプルルート
Route::get('/your/route', function () {
    $babyName = '赤ちゃんの名前'; // 実際の赤ちゃんの名前を取得する方法に置き換えてください

    // セッションに baby_Name を設定する
    Session::put('baby_Name', $babyName);

    return view('your.view');
});

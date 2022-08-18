<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\board\lifeStoryBoardController;
use App\Http\Controllers\covidInfo\covidInfo;
use App\Http\Controllers\covidInfo\covidNewsController;

use App\Http\Controllers\profile\show;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/index', [BaseController::class, 'index'])->name('home');

// 네비게이션
//코로나 정보
Route::get('/covidInfo', [covidInfo::class, 'index'])->name('covidInfo');
//코로나 뉴스
Route::get('/covidNews', [covidNewsController::class, 'index'])->name('covidNews');
Route::get('/covidNews/create', [covidNewsController::class, 'create'])->name('covidNewsCreate');
Route::post('/covidNews', [covidNewsController::class, 'store'])    ;
Route::get('/covidNews/{covidNews}', [covidNewsController::class, 'show']);
Route::get('/covidNews/{covidNews}/edit', [covidNewsController::class, 'edit'])->name('covidNewsEdit');
Route::put('/covidNews/{covidNews}', [covidNewsController::class, 'update']);
Route::delete('/covidNews/{covidNews}', [covidNewsController::class, 'destroy']);
//파일 업로드
Route::post('/covidNews/upload', [covidNewsController::class, 'upload'])->name('covidNewsUpload');

//게시판
//일상이야기
Route::get('/lifeStory', [LifeStoryBoardController::class, 'index'])->name('lifeStory');



//프로필
Route::get('/user/profile', [show::class, 'index'])->name('profileShow');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\board\lifeStoryController;
use App\Http\Controllers\covidInfo\covidInfo;
use App\Http\Controllers\covidInfo\covidNewsController;
use App\Http\Controllers\board\LifeStoryBoardController;
use App\Http\Controllers\extra\CommentController;
use App\Http\Controllers\profile\show;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/index', [BaseController::class, 'index']);

// 네비게이션
//코로나 정보
Route::get('/covidInfo', [covidInfo::class, 'index'])->name('covidInfo');
//코로나 뉴스
Route::get('/covidNews', [covidNewsController::class, 'index'])->name('covidNews');
Route::get('/covidNews/{covidNews}', [covidNewsController::class, 'show'])->name('covidNewsShow');

Route::middleware('auth')->group(function () {

    Route::get('/covidNews/create/private', [covidNewsController::class, 'create'])->name('covidNewsCreate');
    Route::post('/covidNews', [covidNewsController::class, 'store']);
    Route::get('/covidNews/{covidNews}/edit', [covidNewsController::class, 'edit'])->name('covidNewsEdit');
    Route::put('/covidNews/{covidNews}', [covidNewsController::class, 'update']);
    Route::delete('/covidNews/{covidNews}', [covidNewsController::class, 'destroy']);
    //파일 업로드
    Route::post('/covidNews/upload', [covidNewsController::class, 'upload'])->name('covidNewsUpload');

});


//게시판
//일상이야기
Route::get('/lifeStory', [lifeStoryController::class, 'index'])->name('lifeStory');
Route::get('/lifeStory/{lifeStoryBoard}', [lifeStoryController::class, 'show'])->name('lifeStoryShow');

Route::middleware('auth')->group(function () {

    Route::put('/lifeStory/{lifeStoryBoard}', [lifeStoryController::class, 'update']);
    Route::get('/lifeStory/create/user', [lifeStoryController::class, 'create'])->name('lifeStoryCreate');
    Route::post('/lifeStory', [lifeStoryController::class, 'store']);
    Route::get('/lifeStory/{lifeStoryBoard}/edit', [lifeStoryController::class, 'edit'])->name('lifeStoryEdit');
    Route::delete('/lifeStory/{lifeStoryBoard}', [lifeStoryController::class, 'destroy']);
//    //파일 업로드
    Route::post('/lifeStory/upload', [lifeStoryController::class, 'upload'])->name('lifeStoryUpload');
});

// 댓글
Route::middleware('auth')->group(function () {
    Route::post('/comment',[CommentController::class, 'store'])->name('comment.add');
    Route::delete('/comment/{comment}', [CommentController::class,'destroy']);
    //파일 업로드
    Route::post('/comment/upload', [lifeStoryController::class, 'upload'])->name('commentUpload');
});


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

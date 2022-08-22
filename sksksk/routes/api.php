<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Auth\Middleware\cekRole;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyModelController;
use App\Http\Controllers\MyModController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\userController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// comment Controller 
Route::post('/getcomment', [CommentController::class, 'getComment']);




// Login Controller / Page
Route::post('/loginDashboard', [LoginController::class, 'tampil']);

// Regis Controller / Page
Route::post('/insertUser', [RegisController::class, 'insertUser']);


// Route group

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/getUser', function() {
        return auth()->user();
    });

    // Dashboard Controller / Page / Tabel Siswa 
    Route::group(['middleware' => 'cek_role'], function () {
        Route::get('/getdata', [MyModelController::class, 'viuu']);
        Route::post('/getdata', [MyModelController::class, 'search']);
        Route::post('/insert', [MyModelController::class, 'insertdt']);
        Route::get('/paginate', [MyModelController::class, 'paginationn']);
    });
    
        
    // Social Controller / Page
    Route::get('/getpost', [MyModController::class, 'getPost']);
    Route::get('/getbookmarkpost', [MyModController::class, 'getBookmarkPost']);

    // MyModel Controller / Tabel Postingan
    Route::post('/insertpostimage', [myModController::class, 'insertpostimage']);
    Route::post('/insertpostcaption', [myModController::class, 'insertpostcaption']);
    Route::post('/bookmarkact', [myModController::class, 'bookmarkAct']);
    Route::post('/likeact', [myModController::class, 'likeAct']);
    Route::post('/followact', [myModController::class, 'followAct']);
    Route::post('/asdf', [myModController::class, 'getFolls']);

    // User Controller
    Route::post('/updateUser', [userController::class, 'updateUser']);
    Route::post('/updateUserImg', [userController::class, 'updateUserImg']);
    Route::get('/auth', [userController::class, 'authh']);
    Route::get('/getalluser', [userController::class, 'getAllUser']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    
    // Comment Controller
    Route::post('/insertcomment', [CommentController::class, 'insertComment']);

    // Route::any('/{slug}', function(){
    //     return view('newdashboard.newdashboard');
    // });

    Route::view("/{slug}", "newdashboard.newdashboard")->where("slug", ".*");

});
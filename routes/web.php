<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ConversationController;
 
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

//=====LOGIN PAGE WILL BE THE INITIAL PAGE=====
Route::get('/', [LoginController::class, 'loginPage'])->name('loginPage');

//=====CUSTOMIZING THE PAGE AFTER VERIFYING EMAIL BY THE USER=====
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return view('welcome');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Auth::routes([
    'verify' => true, // Verify email
]);

// REDIRECT ROOT URL TO THE LOGIN PAGE
Route::redirect('/login', '/'); // REDIRECT TO LOGIN PAGE
Route::post('/login', [LoginController::class, 'login']); // USER LOGGED INTO THE PAGE

//=====LOGIN FUNCTION=====
// Route::get('/auth_pass/{id}', [LoginController::class, 'toPasswordPage'])->name('auth_pass'); // TO PASSWORD PAGE
Route::match(['get', 'post'],'/auth_pass', [LoginController::class, 'toPasswordPage'])->name('auth_pass'); // TO PASSWORD PAGE
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified'); // HOME PAGE

//=====REGISTER FUNCTION=====
// Route::view('/register', 'auth.register');
// Route::get('/register', function () { return view('auth.register'); });


//=====ADMIN LOGIN PAGE======
Route::view('/adminLogin', 'admin.auth.login');

Route::middleware('auth')->group(function () {

    Route::middleware(['can:isUser'])->group(function () {

        //=====PROFILE PAGE=====
        Route::get('/user_profile' , [UserController::class, 'navigateToUserProfile']); // GO TO PROFILE PAGE

        //=====MANAGE POST=====
        // Route::get('/manage_post', [PostController::class, 'index']); // GO TO MANAGE POST PAGE
        Route::post('/create_post', [PostController::class, 'addPost']);
        Route::get('/deletePost/{id}', [PostController::class, 'deletePost']);
        Route::Post('/editPost', [PostController::class, 'editPost']);

        //=====CHAT=====
        Route::get('/chat', [ConversationController::class, 'index']);

        //=====VIEW USER=====
        Route::post('/view_user', [UserController::class, 'viewUser']);

        //=====JOB LIST PAGE=====
        // Route::get();

        //=====USER HOME (VIEW NEWS FEED)=====
        // Route::get('/upLike/{id}', [PostController::class, 'addLikes']);

        //=====APPLY CAREER ADVISORY FUNCTION=====
        // Route::get();

        //=====PROFILE=====
        // Route::get('/userProfile', [UserController::class, 'index']);
    });

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::view('welcome', 'welcome'); // NEED TO BE DELETED 
    });

});




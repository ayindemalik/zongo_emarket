<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Frontend\Ecommerce\IndexController;

// use Auth;
use App\Models\User;
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


/* ------------- Admin Route -------------- */

Route::prefix('admin')->group(function (){

    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
    
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    
    // Adding the middleware force it to check automatically    
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin'); 

    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    
    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');
    
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

    // Profile Process
    Route::get('/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/profile/store_update',[AdminProfileController::class, 'AdminStoreUpdate'])->name('admin.profile.store_update');
    Route::get('/profile/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.profile.changepassword');
    Route::post('/profile/update_password',[AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');    
    
    });
    
/* ------------- End Admin Route -------------- */


/* ------------- Seller Route -------------- */

Route::prefix('seller')->group(function (){

    Route::get('/login',[SellerController::class, 'SellerIndex'])->name('seller_login_from');
    
    Route::get('/dashboard',[SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');
    
    Route::post('/login/owner',[SellerController::class, 'SellerLogin'])->name('seller.login');
    
    Route::get('/logout',[SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');
    
    Route::get('/register',[SellerController::class, 'SellerRegister'])->name('seller.register');
    
    Route::post('/register/create',[SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');
    
    
}); 
/* ------------- End Seller Route -------------- */



Route::get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* ALL FRONT END CONTROLLER*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/update_profile', [IndexController::class, 'updateProfile'])->name('user.update_profile');
Route::post('/user/save_profile_update', [IndexController::class, 'saveProfileUpdate'])->name('user.save_profile_update');
Route::get('/user/change_password', [IndexController::class, 'changePassword'])->name('user.change_password');
Route::post('/user/save_password_update', [IndexController::class, 'userUpdatePassword'])->name('user.change_password_update');




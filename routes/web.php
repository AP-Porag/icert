<?php

use App\Http\Controllers\Admin\About\AboutController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Entry\EntryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Profile\UserProfileController;
use App\Http\Controllers\Admin\Promo\PromoController;
use App\Http\Controllers\Admin\Promo\SpecialPromoController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\ThirdParty\AuthenticatorController;
use App\Http\Controllers\Admin\ThirdParty\ThirdPartyDropOffController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/execute-command', function () {
//    return redirect()->route('login');
//    Artisan::call('storage:link');
    Artisan::call('migrate:fresh --seed');
    dd('All commands executed successfully');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//all routes for admin
Route::prefix('admin')->as('admin.')->group(function () {
    // USER
    Route::resource('users', UsersController::class);

    //Role
    Route::resource('roles', RoleController::class);

    // PROFILE
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.info');
    Route::post('/avatar/update', [UserProfileController::class, 'avatarUpdate'])->name('avatar.update');
    Route::put('/profile/update/{id}', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/pass/update/', [UserProfileController::class, 'updatePassword'])->name('update.password');

    //about
    Route::resource('about', AboutController::class);

    //third party drop off
    Route::resource('thirds', ThirdPartyDropOffController::class);
    Route::post('/thirds/find/if/exists', [ThirdPartyDropOffController::class,'findIfExists']);

    //authenticators
    Route::resource('authenticators', AuthenticatorController::class);
    Route::get('/authenticators/change/status/{id}', [AuthenticatorController::class,'changeStatus'])->name('authenticators.change-status');
    Route::post('/authenticators/save/status/{id}', [AuthenticatorController::class,'saveStatus'])->name('authenticators.save-status');
    Route::post('/authenticators/find/if/exists', [AuthenticatorController::class,'findIfExists']);


    //promos
    Route::resource('promos', PromoController::class);
    Route::get('/promos/makeSPC/${id}',[PromoController::class,'makeSPC'] )->name('promos.makeSPC');

    Route::resource('slpromos', SpecialPromoController::class);
    Route::get('/slpromos/makeNPC/${id}',[SpecialPromoController::class,'makeNPC'] )->name('slpromos.makeNPC');
    Route::get('/slpromos/attach/aditional/customer/${id}',[SpecialPromoController::class,'attachAditionalCustomer'] )->name('slpromos.attachAditionalCustomer');
    Route::post('/slpromos/save/aditional/customer',[SpecialPromoController::class,'saveAditionalCustomer'] )->name('slpromos.saveAditionalCustomer');

    //entries
    Route::resource('entries', EntryController::class);
    Route::get('/entries/get-customer/info/{id}',[EntryController::class,'getCustomerInfo'] )->name('entries.getCustomerInfo');
    Route::post('/entries/add-additional/pieces',[EntryController::class,'addAdditionalPieces'] )->name('entries.addAdditional.pieces');
    Route::post('/entries/entry/item/destroy',[EntryController::class,'itemDestroy'] )->name('entries.entry.item.destroy');
    Route::post('/entries/add/new/item',[EntryController::class,'newItemAdd'] )->name('entries.add.new.item');
    Route::post('/entries/edit/new/item',[EntryController::class,'newItemEdit'] )->name('entries.edit.new.item');
    //customers
    Route::resource('customers', CustomerController::class);

    //products
    Route::resource('products', ProductController::class);

});

//all routes for manager
Route::prefix('manager')->as('manager.')->group(function () {

});

//all routes for HR
Route::prefix('hr')->as('hr.')->group(function () {

});

//all routes for Employee
Route::prefix('employee')->as('employee.')->group(function () {

});



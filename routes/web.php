<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RentPaymentController;
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

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::prefix('admin')->group(function() {
    Route::middleware('admin')->group(function() {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
    Route::resource('categories', CategoryController::class, [
        'names' => [
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]
    ]);

    Route::resource('rooms', RoomController::class, [
        'names' => [
            'index' => 'admin.rooms.index',
            'create' => 'admin.rooms.create',
            'store' => 'admin.rooms.store',
            'edit' => 'admin.rooms.edit',
            'update' => 'admin.rooms.update',
            'destroy' => 'admin.rooms.destroy'
        ]
    ]);

    Route::resource('tenants', TenantController::class, [
        'names' => [
            'index' => 'admin.tenants.index',
            'create' => 'admin.tenants.create',
            'store' => 'admin.tenants.store',
            'show' => 'admin.tenants.show',
            'edit' => 'admin.tenants.edit',
            'destroy' => 'admin.tenants.destroy'
        ]
    ]);

    Route::resource('rentpayments', RentPaymentController::class, [
        'names' => [
            'index' => 'admin.rentpayments.index',
            'create' => 'admin.rentpayments.create',
            'store' => 'admin.rentpayments.store',
            'show' => 'admin.rentpayments.show',
            'edit' => 'admin.rentpayments.edit',
            'destroy' => 'admin.rentpayments.destroy'
        ]
    ]);

    Route::get('/rentpayments/{tenant}/create', [RentPaymentController::class, 'create'])
    ->name('admin.rentpayments.create_for_tenant');
    Route::get('/payments', [PaymentController::class, 'index'])
        ->name('admin.payments.index');
    Route::get('/payments/{tenant}', [PaymentController::class, 'show'])
        ->name('admin.payments.show');

// Separate update routes for Edit Profile and Edit Account
Route::put('tenants/{tenant}/profile', [TenantController::class, 'updateProfile'])->name('admin.tenants.updateProfile');
Route::put('tenants/{tenant}/account', [TenantController::class, 'updateSetting'])->name('admin.tenants.updateSetting');

    //reviews routes
    Route::get('reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::get('edit/{review}/{status}/reviews', [ReviewController::class, 'toggleReviewStatus'])->name('admin.reviews.edit');
    Route::delete('delete/{review}/reviews', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    //pictures routes
    Route::get('pictures', [PictureController::class, 'index'])->name('admin.pictures.index');
    Route::get('edit/{picture}/{status}/pictures', [PictureController::class, 'togglePictureStatus'])->name('admin.pictures.edit');
    //users routes
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('delete/{user}/users', [UserController::class, 'destroy'])->name('admin.users.destroy');
    //orders routes
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::delete('delete/{order}/orders', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
});

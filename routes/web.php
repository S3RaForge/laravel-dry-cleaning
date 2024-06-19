<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewControllerr;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

// Home page
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('home', [MainController::class, 'index']);

// Auth::routes();
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware(['auth', 'admin'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->middleware(['auth', 'admin']);
// Password Reset Routes...
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);

// Main routes
Route::get('blog', [MainController::class, 'blog']);

// Contact routes
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'send']);

// Review routes
Route::get('review', [ReviewControllerr::class, 'index'])->name('review.index');
Route::get('new-review', [ReviewControllerr::class, 'create']);
Route::post('new-review', [ReviewControllerr::class, 'store']);
Route::delete('review/delete/{review:id}', [ReviewControllerr::class, 'delete'])->middleware(['auth', 'admin'])->name('delete.review');

// Service routes
Route::get('service', [ServiceController::class, 'index'])->name('service.index');
Route::get('service/{service:slug}', [ServiceController::class, 'serviceById']);
Route::get('new-service', [ServiceController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('new-service', [ServiceController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('service/edit/{service:slug}', [ServiceController::class, 'edit'])->middleware(['auth', 'admin']);
Route::put('service/edit/{service:slug}', [ServiceController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('service/delete/{service:slug}', [ServiceController::class, 'delete'])->middleware(['auth', 'admin'])->name('delete.service');


// Branch routes
Route::get('branch', [BranchController::class, 'index'])->name('branch.index');
Route::get('branch/{branch:slug}', [BranchController::class, 'branchById']);
Route::get('new-branch', [BranchController::class, 'create'])->middleware(['auth', 'admin']);
Route::post('new-branch', [BranchController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('branch/edit/{branch:slug}', [BranchController::class, 'edit'])->middleware(['auth', 'admin']);
Route::put('branch/edit/{branch:slug}', [BranchController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('branch/delete/{branch:slug}', [BranchController::class, 'delete'])->middleware(['auth', 'admin'])->name('delete.branch');

// Order routes
Route::get('order', [OrderController::class, 'index']);
Route::get('create', [OrderController::class, 'create']);
Route::post('create', [OrderController::class, 'store']);
Route::get('find', [OrderController::class, 'find']);
Route::post('find', [OrderController::class, 'getByUniqid']);
Route::get('order/managment', [OrderController::class, 'managment'])->middleware(['auth'])->name('order.managment');
Route::put('order/edit/{order:id}', [OrderController::class, 'update'])->middleware(['auth'])->name('edit.order');
Route::delete('order/delete/{order:id}', [OrderController::class, 'delete'])->middleware(['auth'])->name('delete.order');

// User routes
Route::get('user', [UserController::class, 'index'])->middleware(['auth', 'admin'])->name('user.index');
Route::get('user/edit/{user:id}', [UserController::class, 'edit'])->middleware(['auth', 'admin']);
Route::put('user/edit/{user:id}', [UserController::class, 'update'])->middleware(['auth', 'admin'])->name('edit.user');
Route::delete('user/delete/{user:id}', [UserController::class, 'delete'])->middleware(['auth', 'admin'])->name('delete.user');

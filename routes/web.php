<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class, 'index']);

Route::get('/category_page', [AdminController::class, 'category_page'])->middleware(Admin::class);

Route::post('/add_category', [AdminController::class, 'add_category'])->middleware(Admin::class);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(Admin::class);

Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(Admin::class);

Route::post('/update_category/{id}', [AdminController::class, 'update_category'])->middleware(Admin::class);

Route::get('/add_book', [AdminController::class, 'add_book'])->middleware(Admin::class);

Route::post('/store_book', [AdminController::class, 'store_book'])->middleware(Admin::class);

Route::get('/show_book', [AdminController::class, 'show_book'])->middleware(Admin::class);

Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->middleware(Admin::class);

Route::get('/delete_book/{id}', [AdminController::class, 'delete_book'])->middleware(Admin::class);

Route::post('/update_book/{id}', [AdminController::class, 'update_book'])->middleware(Admin::class);

Route::get('/borrow_request', [AdminController::class, 'borrow_request'])->middleware(Admin::class);

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])->middleware(Admin::class);

Route::get('/return_book/{id}', [AdminController::class, 'return_book'])->middleware(Admin::class);

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->middleware(Admin::class);

Route::get('/remove_book/{id}', [AdminController::class, 'remove_book'])->middleware(Admin::class);

Route::get('/create_request', [AdminController::class, 'create_request'])->middleware(Admin::class);

Route::get('/create_approve/{id}', [AdminController::class, 'create_approve'])->middleware(Admin::class);

Route::get('/create_reject/{id}', [AdminController::class, 'create_reject'])->middleware(Admin::class);

Route::get('/create_publish/{id}', [AdminController::class, 'create_publish'])->middleware(Admin::class);

Route::get('/create_edit/{id}', [AdminController::class, 'create_edit'])->middleware(Admin::class);

Route::post('/create_update/{id}', [AdminController::class, 'create_update'])->middleware(Admin::class);

Route::get('/create_delete/{id}', [AdminController::class, 'create_delete'])->middleware(Admin::class);

Route::get('/make_latest/{id}', [AdminController::class, 'make_latest'])->middleware(Admin::class);

Route::get('/not_latest/{id}', [AdminController::class, 'not_latest'])->middleware(Admin::class);



Route::get('/book_details/{id}', [HomeController::class, 'book_details']);

Route::get('/borrow_books/{id}', [HomeController::class, 'borrow_books']);

Route::get('/book_history', [HomeController::class, 'book_history']);

Route::get('/cancel_req/{id}', [HomeController::class, 'cancel_req']);

Route::get('/explore', [HomeController::class, 'explore']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/cat_search/{id}', [HomeController::class, 'cat_search']);

Route::get('/create', [HomeController::class, 'create']);

Route::post('/createyours', [HomeController::class, 'createyours']);

Route::get('/cancel_create/{id}', [HomeController::class, 'cancel_create']);


Route::get('/featured_book_details/{id}', [HomeController::class, 'featured_book_details']);





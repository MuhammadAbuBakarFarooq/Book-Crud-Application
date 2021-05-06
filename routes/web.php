<?php

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



Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

	Route::get('/approval', [App\Http\Controllers\ApprovalController::class, 'approval'])->name('approval');

	Route::middleware(['approved'])->group(function () {
		Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		Route::get('/addNewBook', [App\Http\Controllers\BookController::class, 'addBookView'])->name('addBookView');
		Route::post('/saveNewBook', [App\Http\Controllers\BookController::class, 'store'])->name('saveNewBook');
		Route::get('/viewAllBooks', [App\Http\Controllers\BookController::class, 'viewAllBooks'])->name('viewAllBooks');
		Route::get('/mockbook/{id}', [App\Http\Controllers\BookController::class, 'mockbook'])->name('mockbook');
		Route::get('/book.edit/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
		Route::get('/book.addversion/{id}', [App\Http\Controllers\BookController::class, 'addVersion'])->name('book.addversion');
		Route::Post('/book.update/', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');

		Route::Post('/version.update/', [App\Http\Controllers\BookVersionController::class, 'storeVersion'])->name('version.update');
		Route::get('/book.delete/{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('book.delete');

		Route::get('/assignRole', [App\Http\Controllers\RoleController::class, 'assignRoleView'])->name('assignRole');
		Route::post('/saveNewRole', [App\Http\Controllers\RoleController::class, 'saveNewRole'])->name('saveNewRole');
	});

	Route::middleware(['admin'])->group(function () {
		Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
		Route::get('/users/{user_id}/approve', [App\Http\Controllers\UserController::class, 'approve'])->name('admin.users.approve');
		Route::get('/users/{user_id}/reject', [App\Http\Controllers\UserController::class, 'reject'])->name('admin.users.reject');
	});
});



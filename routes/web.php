
<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [FrontController::class, 'developer'])->name('home');
Route::get('/profile', [FrontController::class, 'profile'])->name('profile');
Route::get('/developer', [FrontController::class, 'developer'])->name('developer');
Route::get('/notes', [FrontController::class, 'notes'])->name('notes');
// for products
Route::get('/products', [FrontController::class, 'products'])->name('products');
Route::post('/add-product',[FrontController::class, 'addProduct'])->name('add_product');
Route::get('/delete-product/{id}',[FrontController::class, 'deleteProduct'])->name('delete_product');
Route::get('/product-detail/{id}',[FrontController::class, 'product'])->name('product_detail');

Route::get('/homee', [FrontController::class, 'home'])->name('homee');
Route::get('/note/{id}', [FrontController::class, 'note'])->name('note');
Route::get('/project/data/{id}', [FrontController::class, 'project_data'])->name('project.data');
Route::get('/change-progress/{id}', [FrontController::class, 'changeProgress'])->name('change_progress');
Route::post('/submit-form', [FrontController::class, 'submitForm'])->name('submit_form');
Route::get('/project-delete/{id}', [FrontController::class, 'projectDelete'])->name('project_delete');

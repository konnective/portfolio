
<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-attempt', [LoginController::class, 'loginAttempt'])->name('login_attempt');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-attempt', [LoginController::class, 'registerAttempt'])->name('register_attempt');

Route::get('/', [FrontController::class, 'developer'])->name('home')->middleware('auth');
Route::get('/profile', [FrontController::class, 'profile'])->name('profile');
Route::get('/developer', [FrontController::class, 'developer'])->name('developer');
Route::get('/insure', [FrontController::class, 'insure'])->name('insure');
Route::get('/notes', [FrontController::class, 'notes'])->name('notes');
Route::get('/blogger', [FrontController::class, 'blogger'])->name('blogger');

//tasks routes
Route::get('/add-task', [TaskController::class, 'addTask'])->name('add-task');
Route::post('/add-task', [TaskController::class, 'create'])->name('add-task');
Route::post('/update-task', [TaskController::class, 'update'])->name('update-task');
Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('view-task');
Route::get('/task-data/{id}', [TaskController::class, 'taskData'])->name('task-data');


// products routes
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::post('/add-product',[ProductController::class, 'addProduct'])->name('add_product');
Route::get('/delete-product/{id}',[ProductController::class, 'deleteProduct'])->name('delete_product');
Route::get('/product-detail/{id}',[ProductController::class, 'product'])->name('product_detail');

//admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // 
        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/edit/{post}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/blog/update', [BlogController::class, 'update'])->name('blog.update');
    });
});

Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('auth');
Route::get('/note/{id}', [FrontController::class, 'note'])->name('note');
Route::get('/project/data/{id}', [FrontController::class, 'project_data'])->name('project.data');
Route::get('/change-progress/{id}', [FrontController::class, 'changeProgress'])->name('change_progress');
Route::post('/submit-form', [FrontController::class, 'submitForm'])->name('submit_form');
Route::get('/project-delete/{id}', [FrontController::class, 'projectDelete'])->name('project_delete');
/* 
    worked on pdf generation of assignment log of cleaning staff
*/
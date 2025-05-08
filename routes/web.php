
<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContentController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PasswordController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login-attempt', [LoginController::class, 'loginAttempt'])->name('login_attempt');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-attempt', [LoginController::class, 'registerAttempt'])->name('register_attempt');

Route::get('/', [FrontController::class, 'home'])->name('home')->middleware('auth');
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

        //routes for content
        Route::get('/contents', [ContentController::class, 'index'])->name('content');
        Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
        Route::post('/content/store', [ContentController::class, 'store'])->name('content.store');
        Route::get('/content/edit/{post}', [ContentController::class, 'edit'])->name('content.edit');
        Route::post('/content/update', [ContentController::class, 'update'])->name('content.update');

        Route::get('/topic-subject', [ContentController::class, 'topicSubject'])->name('topic.subject');

        Route::post('/topic/add', [ContentController::class, 'addTopic'])->name('topic.store');
        Route::post('/subject/add', [ContentController::class, 'addSubject'])->name('subject.store');

        //routes for products
        Route::get('/products', [AdminProductController::class, 'index'])->name('products');
        Route::get('/product/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/update', [AdminProductController::class, 'update'])->name('product.update');
        Route::post('/product/destroy', [AdminProductController::class, 'destroy'])->name('product.destroy');
        
        Route::get('/cat/create', [CategoryController::class, 'create'])->name('cat.create');
        Route::post('/cat/store', [CategoryController::class, 'store'])->name('cat.store');
        
        //for orders
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        //for banner
        Route::get('/banners', [BannerController::class, 'index'])->name('banners');
        Route::post('/update/banner', [BannerController::class, 'createOrUpdate'])->name('banner.update');
        //for password manager

        Route::get('/passwords', [PasswordController::class, 'index'])->name('passwords');
        Route::get('/password/view/{id}', [PasswordController::class, 'view'])->name('password.view');
        Route::get('/password/create', [PasswordController::class, 'create'])->name('password.create');
        Route::post('/password/store', [PasswordController::class, 'store'])->name('password.store');
        Route::get('/password/edit/{id}', [PasswordController::class, 'edit'])->name('password.edit');
        Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
        Route::post('/password/destroy', [PasswordController::class, 'destroy'])->name('password.destroy');

    });
});

Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('auth');
Route::get('/note/{id}', [FrontController::class, 'note'])->name('note');
Route::get('/project/data/{id}', [FrontController::class, 'project_data'])->name('project.data');
Route::get('/change-progress/{id}', [FrontController::class, 'changeProgress'])->name('change_progress');
Route::post('/submit-form', [FrontController::class, 'submitForm'])->name('submit_form');
Route::get('/project-delete/{id}', [FrontController::class, 'projectDelete'])->name('project_delete');

Route::name('frontend.')->group(function () {
    Route::controller(FrontendController::class)->group(function () {
        Route::get('/ecom', 'index')->name('index');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/product/{id}', 'productDetail')->name('product-detail');
        Route::post('/test', 'test')->name('test');
    });
});

Route::get('/image', function () {
    return view('frontend.bin.test');
});
Route::get('/das', function () {
    return view('frontend.bin.new-base');
});
Route::get('/store', function () {
    return view('frontend.new-store.main-page');
});
Route::get('/store/details', function () {
    return view('frontend.bin.details');
});
Route::get('/store/cart', function () {
    return view('frontend.bin.new-cart');
});
// Route::get('/details', function () {
//     return view('frontend.pro-details');
// });
/* 
    worked on pdf generation of assignment log of cleaning staff
*/


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('admin.dashboard');
// });


Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.login.store');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/item', [ItemController::class, 'index'])->name('item');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');


    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/contacts', [App\Http\Controllers\Admin\HomeController::class, 'contacts_list'])->name('admin.contacts');
    //blog
    // Route::get('/admin/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog');
    // Route::get('/admin/create/blog', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');
    // Route::post('/admin/store/blog', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.store');
    // Route::get('/admin/edit/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
    // Route::post('/admin/update/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');
    // Route::get('/admin/delete/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('admin.blog.delete');

    //trainer
    Route::get('/admin/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/create/products', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/store/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/edit/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/update/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/admin/delete/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.delete');
    //products
    Route::get('/admin/trainer', [\App\Http\Controllers\Admin\TrainerController::class, 'index'])->name('admin.trainer');
    Route::get('/admin/create/trainer', [\App\Http\Controllers\Admin\TrainerController::class, 'create'])->name('admin.trainer.create');
    Route::post('/admin/store/trainer', [\App\Http\Controllers\Admin\TrainerController::class, 'store'])->name('admin.trainer.store');
    Route::get('/admin/edit/trainer/{id}', [\App\Http\Controllers\Admin\TrainerController::class, 'edit'])->name('admin.trainer.edit');
    Route::post('/admin/update/trainer/{id}', [\App\Http\Controllers\Admin\TrainerController::class, 'update'])->name('admin.trainer.update');
    Route::get('/admin/delete/trainer/{id}', [\App\Http\Controllers\Admin\TrainerController::class, 'destroy'])->name('admin.trainer.delete');
    //classes
    Route::get('/admin/class', [\App\Http\Controllers\Admin\ClassController::class, 'index'])->name('admin.class');
    Route::get('/admin/create/class', [\App\Http\Controllers\Admin\ClassController::class, 'create'])->name('admin.class.create');
    Route::post('/admin/store/class', [\App\Http\Controllers\Admin\ClassController::class, 'store'])->name('admin.class.store');
    Route::get('/admin/edit/class/{id}', [\App\Http\Controllers\Admin\ClassController::class, 'edit'])->name('admin.class.edit');
    Route::post('/admin/update/class/{id}', [\App\Http\Controllers\Admin\ClassController::class, 'update'])->name('admin.class.update');
    Route::get('/admin/delete/class/{id}', [\App\Http\Controllers\Admin\ClassController::class, 'destroy'])->name('admin.class.delete');
    //gallery
    Route::get('/admin/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery');
    Route::get('/admin/create/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/store/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/edit/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::post('/admin/update/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::get('/admin/delete/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.delete');

    //category
    Route::get('/admin/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/create/category', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/store/category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/edit/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/update/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/delete/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');

    Route::get('/admin/order', [\App\Http\Controllers\Admin\OrderController::class, 'order'])->name('admin.order');
});
Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/about', [\App\Http\Controllers\PagesController::class, 'about'])->name('about');
// Route::get('/tour', [\App\Http\Controllers\PagesController::class, 'tour'])->name('tour');
// Route::get('/services', [\App\Http\Controllers\PagesController::class, 'services'])->name('services');
// Route::get('/favourite/{id}', [\App\Http\Controllers\PagesController::class, 'blog_single'])->name('blog.single');
// // Route::get('/blog', [\App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::get('/classes', [\App\Http\Controllers\PagesController::class, 'classes'])->name('classes');
Route::get('/product', [\App\Http\Controllers\PagesController::class, 'product'])->name('product');
Route::get('/classes/single/{id}', [\App\Http\Controllers\PagesController::class, 'classes_single'])->name('classes.single');
Route::get('/product/single/{id}', [\App\Http\Controllers\PagesController::class, 'product_single'])->name('product.single');
Route::get('/services', [\App\Http\Controllers\PagesController::class, 'services'])->name('services');
Route::get('/team', [\App\Http\Controllers\PagesController::class, 'contact'])->name('team');
Route::post('/contact', [\App\Http\Controllers\PagesController::class, 'contact_store'])->name('contact.store');
Route::post('/selectplan', [\App\Http\Controllers\PagesController::class, 'selectplan'])->name('plan.store');
Route::get('/selectplan/error', [\App\Http\Controllers\PagesController::class, 'planerror'])->name('plan.error');
Route::post('/upgradeplan/{id}', [\App\Http\Controllers\PagesController::class, 'upgradeplan'])->name('plan.upgrade');


//cart
Route::get('cart', [\App\Http\Controllers\PagesController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\PagesController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [\App\Http\Controllers\PagesController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [\App\Http\Controllers\PagesController::class, 'remove'])->name('remove_from_cart');

Route::get('checkout', [\App\Http\Controllers\PagesController::class, 'checkout'])->name('checkout');
Route::post('place/order', [\App\Http\Controllers\PagesController::class, 'place_order'])->name('place.order');

Route::get('/payment-stripe', [\App\Http\Controllers\PagesController::class, 'stripe'])->name('stripe');

Route::post('/stripe/post', [\App\Http\Controllers\StripeController::class, 'stripePyament'])->name("stripe.post");


Route::get('/selectpackage1', [\App\Http\Controllers\PagesController::class, 'select1'])->name('select1');
Route::get('/selectpackage2', [\App\Http\Controllers\PagesController::class, 'select2'])->name('select2');
Route::get('/selectpackage3', [\App\Http\Controllers\PagesController::class, 'select3'])->name('select3');

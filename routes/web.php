<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\Product\IndexController;
use App\Http\Controllers\Client\MainController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\CorsMiddleware;
use App\Http\Controllers\Auth\LoginController;


require __DIR__.'/auth.php';




Route::prefix('admin')->group(function () {
    

    Route::get('/', App\Http\Controllers\Admin\Main\IndexController::class)->name('main.index');

    Route::group(['prefix'=>'categories'], function(){
        Route::get('/', App\Http\Controllers\Admin\Category\IndexController::class)->name('category.index');
        Route::get('/{category}/edit', App\Http\Controllers\Admin\Category\EditController::class)->name('category.edit');
        Route::patch('/{category}', App\Http\Controllers\Admin\Category\UpdateController::class)->name('category.update');
        Route::delete('/{category}', App\Http\Controllers\Admin\Category\DeleteController::class)->name('category.delete');
        Route::post('/', App\Http\Controllers\Admin\Category\StoreController::class)->name('category.store');
        Route::get('/create', App\Http\Controllers\Admin\Category\CreateController::class)->name('category.create');
        Route::get('/{category}', App\Http\Controllers\Admin\Category\ShowController::class)->name('category.show');
    });

    Route::group(['prefix'=>'tags'], function(){
        Route::get('/', App\Http\Controllers\Admin\Tag\IndexController::class)->name('tag.index');
        Route::get('/{tag}/edit', App\Http\Controllers\Admin\Tag\EditController::class)->name('tag.edit');
        Route::patch('/{tag}', App\Http\Controllers\Admin\Tag\UpdateController::class)->name('tag.update');
        Route::delete('/{tag}', App\Http\Controllers\Admin\Tag\DeleteController::class)->name('tag.delete');
        Route::post('/', App\Http\Controllers\Admin\Tag\StoreController::class)->name('tag.store');
        Route::get('/create', App\Http\Controllers\Admin\Tag\CreateController::class)->name('tag.create');
        Route::get('/{tag}', App\Http\Controllers\Admin\Tag\ShowController::class)->name('tag.show');
    });

    Route::group(['prefix'=>'colors'], function(){
        Route::get('/', App\Http\Controllers\Admin\Color\IndexController::class)->name('color.index');
        Route::get('/{color}/edit', App\Http\Controllers\Admin\Color\EditController::class)->name('color.edit');
        Route::patch('/{color}', App\Http\Controllers\Admin\Color\UpdateController::class)->name('color.update');
        Route::delete('/{color}', App\Http\Controllers\Admin\Color\DeleteController::class)->name('color.delete');
        Route::post('/', App\Http\Controllers\Admin\Color\StoreController::class)->name('color.store');
        Route::get('/create', App\Http\Controllers\Admin\Color\CreateController::class)->name('color.create');
        Route::get('/{color}', App\Http\Controllers\Admin\Color\ShowController::class)->name('color.show');
    });

    Route::group(['prefix'=>'persons'], function(){
        Route::get('/', App\Http\Controllers\Admin\User\IndexController::class)->name('user.index');
        Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('user.edit');
        Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}', App\Http\Controllers\Admin\User\DeleteController::class)->name('user.delete');
        Route::post('/', App\Http\Controllers\Admin\User\StoreController::class)->name('user.store');
        Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('user.create');
        Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('user.show');
    });

    Route::group(['prefix'=>'products'], function(){
        Route::get('/', App\Http\Controllers\Admin\Product\IndexController::class)->name('product.index');
        Route::get('/{product}/edit', App\Http\Controllers\Admin\Product\EditController::class)->name('product.edit');
        Route::patch('/{product}', App\Http\Controllers\Admin\Product\UpdateController::class)->name('product.update');
        Route::delete('/{product}', App\Http\Controllers\Admin\Product\DeleteController::class)->name('product.delete');
        Route::post('/', App\Http\Controllers\Admin\Product\StoreController::class)->name('product.store');
        Route::get('/create', App\Http\Controllers\Admin\Product\CreateController::class)->name('product.create');
        Route::get('/{product}', App\Http\Controllers\Admin\Product\ShowController::class)->name('product.show');
    });

    Route::group(['prefix'=>'group'], function(){
        Route::get('/', App\Http\Controllers\Admin\Group\IndexController::class)->name('group.index');
        Route::get('/{group}/edit', App\Http\Controllers\Admin\Group\EditController::class)->name('group.edit');
        Route::patch('/{group}', App\Http\Controllers\Admin\Group\UpdateController::class)->name('group.update');
        Route::delete('/{group}', App\Http\Controllers\Admin\Group\DeleteController::class)->name('group.delete');
        Route::post('/', App\Http\Controllers\Admin\Group\StoreController::class)->name('group.store');
        Route::get('/create', App\Http\Controllers\Admin\Group\CreateController::class)->name('group.create');
        Route::get('/{group}', App\Http\Controllers\Admin\Group\ShowController::class)->name('group.show');
    });
    Route::group(['prefix'=>'products'], function(){
        Route::get('/', App\Http\Controllers\Admin\Product\IndexController::class)->name('product.index');
        Route::get('/{product}/edit', App\Http\Controllers\Admin\Product\EditController::class)->name('product.edit');
        Route::patch('/{product}', App\Http\Controllers\Admin\Product\UpdateController::class)->name('product.update');
        Route::delete('/{product}', App\Http\Controllers\Admin\Product\DeleteController::class)->name('product.delete');
        Route::post('/', App\Http\Controllers\Admin\Product\StoreController::class)->name('product.store');
        Route::get('/create', App\Http\Controllers\Admin\Product\CreateController::class)->name('product.create');
        Route::get('/{product}', App\Http\Controllers\Admin\Product\ShowController::class)->name('product.show');
    });
    Route::group(['prefix'=>'orders'], function(){
        Route::get('/', App\Http\Controllers\Admin\Order\IndexController::class)->name('order.index');
        Route::get('/{order}/edit', App\Http\Controllers\Admin\Order\EditController::class)->name('order.edit');
        Route::patch('/{order}', App\Http\Controllers\Admin\Order\UpdateController::class)->name('order.update');
        Route::delete('/{order}', App\Http\Controllers\Admin\Order\DeleteController::class)->name('order.delete');
        Route::get('/{order}', App\Http\Controllers\Admin\Order\ShowController::class)->name('order.show');
    });
    

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{page}', MainController::class)->where('page', '.*');



Route::get('/products', \App\Http\Controllers\API\Product\IndexController::class);
Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);
Route::post('/filters', \App\Http\Controllers\API\Product\FilterListController::class);
Route::post('/products/{product}', \App\Http\Controllers\API\Product\ShowController::class);
Route::post('/products', \App\Http\Controllers\API\Product\IndexController::class);

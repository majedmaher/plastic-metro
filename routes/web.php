<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Layer2Controller;
use App\Http\Controllers\LayerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SlideController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    // Slide
    Route::get('/slides', [SlideController::class, 'index'])->name('slide.show');
    Route::get('/slides/create', [SlideController::class, 'create'])->name('slide.create');
    Route::get('/slides/edit/{id}', [SlideController::class, 'edit'])->name('slide.edit');
    Route::get('/slides/destroy/{id}', [SlideController::class, 'destroy'])->name('slide.destroy');
    Route::post('/slides/store', [SlideController::class, 'store'])->name('slide.store');
    Route::post('/slides/update/{id}', [SlideController::class, 'update'])->name('slide.update');


    // Project
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.show');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::get('/projects/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('project.store');
    Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('project.update');


    // Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.show');
    Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    // Banner
    Route::get('/banners', [LayerController::class, 'index'])->name('layer.show');
    Route::get('/banners/edit/{id}', [LayerController::class, 'edit'])->name('layer.edit');
    Route::get('/banners/destroy/{id}', [LayerController::class, 'destroy'])->name('layer.destroy');
    Route::post('/banners/store', [LayerController::class, 'store'])->name('layer.store');
    Route::post('/banners/update/{id}', [LayerController::class, 'update'])->name('layer.update');

    // News
    Route::get('/news', [NewsController::class, 'index'])->name('news.show');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::get('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');

    // Banner2
    Route::get('/banners2', [Layer2Controller::class, 'index'])->name('layer2.show');
    Route::get('/banners2/edit/{id}', [Layer2Controller::class, 'edit'])->name('layer2.edit');
    Route::get('/banners2/destroy/{id}', [Layer2Controller::class, 'destroy'])->name('layer2.destroy');
    Route::post('/banners2/store', [Layer2Controller::class, 'store'])->name('layer2.store');
    Route::post('/banners2/update/{id}', [Layer2Controller::class, 'update'])->name('layer2.update');
});

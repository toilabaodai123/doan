<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire;
use App\Http\Livewire\AdminPostComponent;
use App\Http\Livewire\AdminProductComponent;
use App\Http\Livewire\AdminProductCategoryComponent;
use App\Http\Livewire\AdminSupplierComponent;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-post', AdminPostComponent::class);
Route::get('/admin-product', AdminProductComponent::class);
Route::get('/admin-product-category', AdminProductCategoryComponent::class);
Route::get('admin/suppliers', AdminSupplierComponent::class);
//Route::get('/admin-dashboard', AdminPostComponent::class);

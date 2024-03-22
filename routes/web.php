<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('layouts\frontend\frontend');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/information', [App\Http\Controllers\ContactController::class, 'contact_info'])->name('contact.info');
Route::post('/c_information', [App\Http\Controllers\ContactController::class, 'c_information'])->name('c_information');
Route::get('/category_page', [App\Http\Controllers\CategoryController::class, 'category_page'])->name('category_page');
Route::post('/category_info', [App\Http\Controllers\CategoryController::class, 'category_info'])->name('category_info');
Route::get('/edit_category_info_{id}', [App\Http\Controllers\CategoryController::class, 'edit_category_info'])->name('edit_category_info');
Route::post('/update_category_info', [App\Http\Controllers\CategoryController::class, 'update_category_info'])->name('update_category_info');
Route::get('/delete_category_info_{id}', [App\Http\Controllers\CategoryController::class, 'delete_category_info'])->name('delete_category_info');


Route::get('/sub_category_page', [App\Http\Controllers\SubCategoryController::class, 'sub_category_page'])->name('sub_category_page');
Route::get('/delete_sub_category_info_{id}', [App\Http\Controllers\SubCategoryController::class, 'delete_sub_category_info'])->name('delete_sub_category_info');
Route::get('/edit_sub_category_info_{id}', [App\Http\Controllers\SubCategoryController::class, 'edit_sub_category_info'])->name('edit_sub_category_info');
Route::post('/sub_category_info', [App\Http\Controllers\SubCategoryController::class, 'sub_category_info'])->name('sub_category_info');
Route::post('/sub_update_category_info', [App\Http\Controllers\SubCategoryController::class, 'sub_update_category_info'])->name('sub_update_category_info');



Route::get('/product_page', [App\Http\Controllers\ProductController::class, 'product_page'])->name('product_page');
Route::get('/edit_product_infos_{id}', [App\Http\Controllers\ProductController::class, 'edit_product_infos'])->name('edit_product_infos');
Route::get('/delete_product_infos_{id}', [App\Http\Controllers\ProductController::class, 'delete_product_infos'])->name('delete_product_infos');
Route::post('/product_sub_category', [App\Http\Controllers\ProductController::class, 'product_sub_category']);
Route::post('/product_info', [App\Http\Controllers\ProductController::class, 'product_info'])->name('product_info');
Route::post('/update_product_info', [App\Http\Controllers\ProductController::class, 'update_product_info'])->name('update_product_info');

Route::get('/inventory_product_infos_{id}', [App\Http\Controllers\InventoryController::class, 'inventory_product_infos'])->name('inventory_product_infos');
Route::post('/inventory_info', [App\Http\Controllers\InventoryController::class, 'inventory_info'])->name('inventory_info');
Route::get('/edit_inventory_info_{id}', [App\Http\Controllers\InventoryController::class, 'edit_inventory_info'])->name('edit_inventory_info');
Route::get('/delete_inventory_info_{id}', [App\Http\Controllers\InventoryController::class, 'delete_inventory_info'])->name('delete_inventory_info');
Route::post('/edit_inventory', [App\Http\Controllers\InventoryController::class, 'edit_inventory'])->name('edit_inventory');

Route::get('/color_page', [App\Http\Controllers\ColorController::class, 'color_page'])->name('color_page');
Route::get('/edit_color_infos_{id}', [App\Http\Controllers\ColorController::class, 'edit_color_infos'])->name('edit_color_infos');
Route::get('/delete_color_infos_{id}', [App\Http\Controllers\ColorController::class, 'delete_color_infos'])->name('delete_color_infos');
Route::post('/color_info', [App\Http\Controllers\ColorController::class, 'color_info'])->name('color_info');
Route::post('/update_color_info', [App\Http\Controllers\ColorController::class, 'update_color_info'])->name('update_color_info');

Route::get('/size_page', [App\Http\Controllers\SizeController::class, 'size_page'])->name('size_page');
Route::post('/size_info', [App\Http\Controllers\SizeController::class, 'size_info'])->name('size_info');
Route::get('/edit_size_infos_{id}', [App\Http\Controllers\SizeController::class, 'edit_size_infos'])->name('edit_size_infos');
Route::get('/delete_size_infos_{id}', [App\Http\Controllers\SizeController::class, 'delete_size_infos'])->name('delete_size_infos');
Route::post('/update_size_info', [App\Http\Controllers\SizeController::class, 'update_size_info'])->name('update_size_info');

Route::get('/brand_page', [App\Http\Controllers\BrandController::class, 'brand_page'])->name('brand_page');
Route::post('/brand_info', [App\Http\Controllers\BrandController::class, 'brand_info'])->name('brand_info');
Route::get('/edit_brand_infos_{id}', [App\Http\Controllers\BrandController::class, 'edit_brand_infos'])->name('edit_brand_infos');
Route::get('/delete_brand_infos_{id}', [App\Http\Controllers\BrandController::class, 'delete_brand_infos'])->name('delete_brand_infos');
Route::post('/update_brand_info', [App\Http\Controllers\BrandController::class, 'update_brand_info'])->name('update_brand_info');


Route::get('/role_page', [App\Http\Controllers\RoleController::class, 'role_page'])->name('role_page');
Route::post('/role_permission', [App\Http\Controllers\RoleController::class, 'role_permission'])->name('role_permission');
Route::post('/role_add', [App\Http\Controllers\RoleController::class, 'role_add'])->name('role_add');
Route::post('/role_user_assigned', [App\Http\Controllers\RoleController::class, 'role_user_assigned'])->name('role_user_assigned');
Route::get('/delete_role_info_{id}', [App\Http\Controllers\RoleController::class, 'delete_role_info'])->name('delete_role_info');
Route::get('/edit_permission_info_{id}', [App\Http\Controllers\RoleController::class, 'edit_permission_info'])->name('edit_permission_info');
Route::Post('/update_permission_info', [App\Http\Controllers\RoleController::class, 'update_permission_info'])->name('update_permission_info');





Route::get('/frontend_page', [App\Http\Controllers\FrontendController::class, 'frontend_page'])->name('frontend_page');
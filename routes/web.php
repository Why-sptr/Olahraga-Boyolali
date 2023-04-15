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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::get('/cabor', function () {
    return view('cabor');
});

// Homepage
Route::get('/homepage', [App\Http\Controllers\HomepageController::class, 'jumlah'])->name('jumlah');

// Route Basket
Route::get('/databasket', [App\Http\Controllers\BasketController::class, 'index'])->name('basket');
Route::get('/tambahbasket', [App\Http\Controllers\BasketController::class, 'tambahbasket']);
Route::post('/insertbasket', [App\Http\Controllers\BasketController::class, 'insertbasket']);
Route::get('/exportpdf', [App\Http\Controllers\BasketController::class, 'exportpdf'])->name('exportpdf');

Route::get('/tampilkandatabasket/{id}', [App\Http\Controllers\BasketController::class, 'tampil'])->name('admin/tampilkanbasket');
Route::post('/updatedatabasket/{id}', [App\Http\Controllers\BasketController::class, 'updatedatabasket'])->name('admin/updatedatabasket');

Route::delete('/deletebasket/{id}', [App\Http\Controllers\BasketController::class, 'delete'])->name('admin/deletebasket');
Route::get('/trashbasket', [App\Http\Controllers\BasketController::class, 'trash'])->name('admin/trashbasket');
Route::get('/restorebasket/{id}', [App\Http\Controllers\BasketController::class, 'restorebasket'])->name('admin/restorebasket');
Route::get('/restorebasketall', [App\Http\Controllers\BasketController::class, 'restorebasketall'])->name('admin/restorebasketall');
Route::get('/hapuspermanenbasket/{id}', [App\Http\Controllers\BasketController::class, 'hapuspermanenbasket'])->name('hapuspermanenbasket');
Route::get('/hapuspermanenbasketall', [App\Http\Controllers\BasketController::class, 'hapuspermanenbasketall'])->name('hapuspermanenbasketall');

// Route Bola
Route::get('/databola', [App\Http\Controllers\SepakBolaController::class, 'index'])->name('bola');
Route::get('/tambahbola', [App\Http\Controllers\SepakBolaController::class, 'tambahbola']);
Route::post('/insertbola', [App\Http\Controllers\SepakBolaController::class, 'insertbola']);
Route::get('/exportpdf', [App\Http\Controllers\SepakBolaController::class, 'exportpdf'])->name('exportpdf');

Route::get('/tampilkandatabola/{id}', [App\Http\Controllers\SepakBolaController::class, 'tampil'])->name('admin/tampilkanbola');
Route::post('/updatedatabola/{id}', [App\Http\Controllers\SepakBolaController::class, 'updatedatabola'])->name('admin/updatedatabola');

Route::delete('/deletebola/{id}', [App\Http\Controllers\SepakBolaController::class, 'delete'])->name('admin/deletebola');
Route::get('/trashbola', [App\Http\Controllers\SepakBolaController::class, 'trash'])->name('admin/trashbola');
Route::get('/restorebola/{id}', [App\Http\Controllers\SepakBolaController::class, 'restorebola'])->name('admin/restorebola');
Route::get('/restorebolaall', [App\Http\Controllers\SepakBolaController::class, 'restorebolaall'])->name('admin/restorebolaall');
Route::get('/hapuspermanenbola/{id}', [App\Http\Controllers\SepakBolaController::class, 'hapuspermanenbola'])->name('hapuspermanenbola');
Route::get('/hapuspermanenbolaall', [App\Http\Controllers\SepakBolaController::class, 'hapuspermanenbolaall'])->name('hapuspermanenbolaall');
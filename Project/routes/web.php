<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PartController;

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


Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/parts', [PartController::class, 'index']);
Route::get('/parts/{id}', [PartController::class, 'getAllPartsBySupplierId']);
Route::get('/exportCSV/{id}',[PartController::class, 'exportCSV']);

Route::put('/suppliers/{supplier}', [SupplierController::class, 'update']);
Route::put('/parts/{part}', [PartController::class, 'update']);


//uradjen soft delete da bi se ocuvao integritet baze
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);

Route::delete('/part/{id}', [PartController::class, 'destroy']);




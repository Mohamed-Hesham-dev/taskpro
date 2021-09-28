<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DistrictController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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






Route::prefix('/')->group(function () {
   Route::resource('',HomeController::class);

   Route::post('restorep/{id}',[ProductController::class,'restore'])->name('restorep');
    Route::resource('products',ProductController::class);

    Route::resource('myAccount',UserController::class);



    Route::resource('districts',DistrictController::class);
    Route::post('restored/{id}',[DistrictController::class,'restore'])->name('restored');
  
    Route::post('restoreb/{id}',[BranchController::class,'restore'])->name('restoreb');
    Route::get('fetch-districts',[BranchController::class,'fetchDistrict']);
    Route::resource('branches',BranchController::class);
    

    
    Route::post('restorebi/{id}',[BillController::class,'restore'])->name('restorebi');
    Route::get('fetch-districts',[BillController::class,'fetchDistrict']);
    Route::get('fetch-branches',[BillController::class,'fetchBranch']);
    Route::resource('bills',BillController::class);
    
});


// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__.'/auth.php';

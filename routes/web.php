<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaContoller;
use App\Http\Controllers\DashboardController;
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


Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::controller(CriteriaContoller::class)->name('criteria.')->group(function () {
    Route::get('/kriteria', 'criteriaView')->name('view');
    Route::post('/kriteria/add', 'criteriaAdd')->name('add');
    Route::patch('/kriteria/edit/{criteria}', 'criteriaEdit')->name('edit');
    Route::delete('/kriteria/delete/{criteria}', 'criteriaDelete')->name('delete');
});


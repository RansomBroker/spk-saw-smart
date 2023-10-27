<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaContoller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\UserController;

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
    Route::get('/', 'dashboardView')->name('view');
});

Route::controller(CriteriaContoller::class)->name('criteria.')->group(function () {
    Route::get('/kriteria', 'criteriaView')->name('view');
    Route::post('/kriteria/add', 'criteriaAdd')->name('add');
    Route::patch('/kriteria/edit/{criteria}', 'criteriaEdit')->name('edit');
    Route::delete('/kriteria/delete/{criteria}', 'criteriaDelete')->name('delete');
});

Route::controller(SubCriteriaController::class)->name('subcrit.')->group(function () {
    Route::get('/sub-kriteria', 'subCriteriaView')->name('view');
    Route::post('/sub-kriteria', 'subCriteriaAdd')->name('add');
    Route::patch('/sub-kriteria/edit/{subCriteria}', 'subCriteriaEdit')->name('edit');
    Route::delete('/sub-kriteria/delete/{subCriteria}', 'subCriteriaDelete')->name('delete');
});

Route::controller(CandidateController::class)->name('candidate.')->group(function () {
    Route::get('/data-calon', 'candidateView')->name('view');
    Route::post('/data-calon/add', 'candidateAdd')->name('add');
    Route::patch('/data-calon/edit/{candidate}', 'candidateEdit')->name('edit');
    Route::delete('/data-calon/delete/{candidate}', 'candidateDelete')->name('delete');
});

Route::controller(CalculateController::class)->name('calculate.')->group(function () {
    Route::get('/kalkulasi', 'calculateView')->name('view');
    Route::post('/kalkulasi/proses', 'calculate')->name('process');
});

Route::controller(CompareController::class)->name('compare.')->group(function () {
    Route::get('/perbandingan', 'compareView')->name('view');
});

Route::controller(UserController::class)->name('user.')->group(function () {
   Route::get('/data-user', 'userView')->name('view');
   Route::post('/data-user/add', 'userAdd')->name('add');
   Route::patch('/data-user/edit/{user}', 'userEdit')->name('edit');
   Route::delete('/data-user/delete/{user}', 'userDelete')->name('delete');
});

<?php

use App\Http\Controllers\SortController;
use App\Http\Controllers\CVformController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UniversityController::class, 'index'])->name('index');
Route::resource('universities', UniversityController::class);
Route::post('/add-university', [UniversityController::class, 'store'])->name('storeUni');
Route::post('/add-technology', [TechnologyController::class, 'store'])->name('storeTech');
Route::post('/save-CVform', [CVformController::class, 'store'])->name('storeTech');
Route::get('/cvs-by-date-range', function () {
    return view('CV_form/sort');
})->name('sort');
Route::get('/sort-by-range', [SortController::class, 'sortByRange'])->name('sortByRange');
Route::get('/cvs-by-creation-date', [SortController::class, 'sortByCreate'])->name('cvs.by.creation.date');
Route::get('/CV_form/show', [CVformController::class, 'index'])->name('CV_form/show'); // used for testing
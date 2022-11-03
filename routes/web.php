<?php

use App\Http\Controllers\SectionOneController;
use App\Http\Controllers\SectionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [SectionController::class, 'index'])->name('section.index');
Route::post('section', [SectionController::class, 'update'])->name('section.update');
Route::post('section-sortable', [SectionController::class, 'sortable'])->name('section.sortable');
Route::post('section/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');

Route::post('section_two', [SectionController::class, 'update_two'])->name('section.update_two');
Route::post('section_two-sortable', [SectionController::class, 'sortable_two'])->name('section.sortable_two');
Route::post('section/delete_two/{id}', [SectionController::class, 'delete_two'])->name('section.delete_two');



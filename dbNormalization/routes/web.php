<?php

use App\Http\Controllers\GroupController;
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
    return redirect()->route('groups');
});

// Route::resource('groups', GroupController::class, [
//     'names' => [
//         'index'   => 'groups',
//         'create'  => 'groups.create',
//         'store'   => 'groups.store',
//         'edit'    => 'groups.edit',
//         'update'  => 'groups.update',
//         'destroy' => 'groups.delete',
//     ]
// ]);

// Groups Route
Route::get('groups', [GroupController::class, 'index'])->name('groups');
Route::get('group/create', [GroupController::class, 'create'])->name('group.create');
Route::put('group/create', [GroupController::class, 'store'])->name('group.store');
Route::get('group/edit/{group:id}', [GroupController::class, 'edit'])->name('group.edit');
Route::put('group/update/{group:id}', [GroupController::class, 'update'])->name('group.update');
Route::get('delete/{group:id}/', [GroupController::class, 'destroy'])->name('group.delete');

// Group Types Route
Route::get('group/types', [GroupController::class, 'typeIndex'])->name('groups.types');
Route::get('group/type/create', [GroupController::class, 'typeCreate'])->name('group.type.create');
Route::put('group/type', [GroupController::class, 'typeStore'])->name('group.type.store');
Route::get('group/type/edit/{type:id}', [GroupController::class, 'typeEdit'])->name('group.type.edit');
Route::put('group/type/update/{type:id}', [GroupController::class, 'typeUpdate'])->name('group.type.update');
Route::get('group/type/delete/{type:id}', [GroupController::class, 'typeDestroy'])->name('group.type.delete');

// Group Data Route
Route::get('groups/data', [GroupController::class, 'dataIndex'])->name('groups.data');
Route::put('groups/data', [GroupController::class, 'dataStore'])->name('group.data.store');

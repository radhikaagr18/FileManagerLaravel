<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Storage;
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

Route::get('/dashboard',[FileUpload::class, 'status'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/fileUpload',[])
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::post('/rename', [FileUpload::class, 'rename'])->name('rename');
Route::get('/delete', [FileUpload::class, 'deleteFile'])->name('delete');
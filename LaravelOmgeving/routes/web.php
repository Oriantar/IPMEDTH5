<?php

use App\Http\Controllers\InbraakMeldingController;
use App\Http\Controllers\InstellingenController;
use App\Http\Controllers\MeldingenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AlarmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CameraController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function (){
    Route::get('/camera', [CameraController::class, 'index'])->name('camera.index');
    Route::get('/camera/add', [CameraController::class, 'add'])->name('camera.add');
    Route::post('/camera/store', [CameraController::class, 'store'])->name('camera.store');
});

Route::middleware('auth')->group(function (){
    Route::get('/meldingen', [MeldingenController::class, 'index'])->name('meldingen.index');
});
Route::middleware('auth')->group(function (){
    Route::get('/instellingen', [InstellingenController::class, 'index'])->name('instellingen.index');
});
Route::get('/alarm', [AlarmController::class, 'index'])->name('alarm.index');
Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
Route::get('/inbraakmelding/{id}', [InbraakMeldingController::class,'index']);

require __DIR__.'/auth.php';

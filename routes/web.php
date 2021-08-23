<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empController;


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

// route::get('/emp_list', [empController::class, 'display']);

Route::get('/insert', [empController::class, 'index'])->name('employee form');
Route::post('/create', [empController::class, 'store'])->name('employee form create');

Route::get('/delete/{id}',  [empController::class, 'destroy']);

// Route::get('edit/{id}', [empController::class, 'edit'], function () {
//             return view('employees.emp_update');
// });
Route::get('edit/{id}', [empController::class, 'show']);
Route::post('edit/', [empController::class,'update']);


Route::get('/send-email/{email}', [MailController::class,'sendEmail'] );

Route::get('aa/{id}', function () {
    return view('employees.emp_text');
});

Route::get('/', [empController::class, 'display'], function () {
    return view('dashboard');
})->middleware(['auth'])->name('index');;

Route::get('/dashboard', [empController::class, 'display'], function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/public/{filename}', function ($filename)
{
    $path = storage_path() . '/resume/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('public');

require __DIR__.'/auth.php';




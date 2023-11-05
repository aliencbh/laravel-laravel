<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//get

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//response
//http response
Route::get('/', function () {
  return response()->json([
      'message' => 'Hello, World!'
  ]);
});

//basic response
//example 1
//return response('Hello World', 200); //return content and code
//example 2
//return response()->view('welcome'); //return page
//
//html request
Route::get('/', function () {
  return response()->view('welcome', [
      'name' => 'Alex',
  ]);
});

//json response
Route::get('/users', function () {
  $users = [
      ['userid' => 1, 'name' => 'Alex'],
      ['userid' => 2, 'name' => 'Jane'],
  ];
  return json($users);
});

//redirect response
Route::post('/signin', function () {
  // Action: user authenticated
  //example 1
  //return redirect('/dashboard'); // Create a redirect response using the redirect helper function
  //example 2
  //return response()->redirect('/dashboard'); // Use the response() helper function to create a redirect response
});

//download response
Route::post('/download', function () {
  //example 1
  //return download('file_path/file_name.zip');
  //example 2
  //return response()->download('file_path/file_name.zip');
});

//file response
//example 1
//return response()->download($pathToFile, 'filename.pdf');
//example 2
//return response()->file($pathToFile);
//example 3
//return response()->stream($pathToFile, 'filename.pdf');
//
//response macro
Response::macro('customJson', function ($data, $statusCode) {
  return response()->json($data, $statusCode);
});
//return Response::customJson(['key' => 'value'], 200);

require __DIR__ . '/auth.php';

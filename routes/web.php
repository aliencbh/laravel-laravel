<?php

use App\Models\User;
use App\Models\Migration;
use App\Models\Test36;
use App\Models\Test37;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Test2Controller;
use App\Http\Controllers\Test23Controller;
use App\Http\Controllers\Test29Controller;
use App\Http\Controllers\Test34Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request as Request3;
use Illuminate\Http\Request as Request11;

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
/*
  |--------------------------------------------------------------------------
  | available routing method
  |--------------------------------------------------------------------------
  |
  | Route::get($uri, $callback);
  | Route::post($uri, $callback);
  | Route::put($uri, $callback);
  | Route::patch($uri, $callback);
  | Route::delete($uri, $callback);
  | Route::options($uri, $callback);
  | Route::match(['get', 'post'], '/', function () {
  |     // ...
  | });
  |
  | Route::any('/', function () {
  |     // ...
  | });
  |
 */
Route::get('/sales/create', [SalesController::class, 'create']);
//Basic Routing
Route::get('/test1', function () {
  return 'Hello World';
});
//The Default Route Files
Route::get('/test2', [Test2Controller::class, 'index']);
//Dependency Injection
Route::get('/test3', function (Request3 $request3) {
  return 'test3';
});
//Redirect Routes default
Route::redirect('/test4', '/'); //302
//Redirect Routes customize the status code
Route::redirect('/test5', '/', 303); //303
//Redirect Routes permanentRedirect
Route::permanentRedirect('/test6', '/'); //301
//View Routes(url, view name),use when only want show view file
Route::view('/test7', 'get');
//View Routes(url, view name, argument),use when only want show view file
//the following parameters are reserved by Laravel and cannot be used: view, data, status, and headers.
Route::view('/test8', 'get', ['test8' => 'Taylor']);
//Required parameters
Route::get('/test9/{id}', function (string $id) {
  return 'Test9 id = ' . $id;
});
//Required many parameters
Route::get('/test10/{post}/comments/{comment}', function (string $postId, string $commentId) {
  return 'Test10 postId = ' . $postId . ', commentId = ' . $commentId;
});
//Parameters & Dependency Injection
Route::get('/test11/{id}', function (Request11 $request11, string $id) {
  return 'Test 11 Id = ' . $id;
});
//Optional Parameters without default variable
Route::get('/test12/{name?}', function (?string $name = null) {
  return 'Test 12 Name = ' . $name;
});
//Optional Parameters with default variable
Route::get('/test13/{name?}', function (?string $name = 'John') {
  return 'Test 13 Name = ' . $name;
});
//Regular Expression Constraints
Route::get('/test14/{id}/{name}', function (string $id, string $name) {
  return 'Test 14 Id = ' . $id . ', Name = ' . $name;
})->whereNumber('id')->whereAlpha('name');
//Regular Expression Constraints
Route::get('/test15/{name}', function (string $name) {
  return 'Test 15 Name = ' . $name;
})->whereAlphaNumeric('name');
//Regular Expression Constraints
Route::get('/test16/{id}', function (string $id) {
  return 'Test 16 Id = ' . $id;
})->whereUuid('id');
//Regular Expression Constraints
Route::get('/test17/{id}', function (string $id) {
  return 'Test 17 Id = ' . $id;
})->whereUlid('id');
//Regular Expression Constraints
Route::get('/test18/{category}', function (string $category) {
  return 'Test 18 Category = ' . $category;
})->whereIn('category', ['movie', 'song', 'painting']);
//Global Constraints
Route::get('/test19/{id}', function (string $id) {
  return 'Test 19 Id = ' . $id;
});
//Encoded Forward Slashes
Route::get('/test20/{search}', function (string $search) {
  return 'Test 20 Search = ' . $search;
});
//Named Routes for page with single parameter
Route::get('/test21/id', function () {
  $url = route('name is route 21', ['id' => 100]);
  return 'Test 21 Url = ' . $url;
})->name('name is route 21');
//Named Routes for page with many parameter
Route::get('/test22/id', function () {
  $url = route('name is route 22', ['id' => 1, 'photos' => 'yes']);
  return 'Test 22 Url = ' . $url;
})->name('name is route 22');
//Named Routes for controller
Route::get(
  '/test23/id',
  [Test23Controller::class, 'index']
)->name('name is route 23');
//Named Routes for page with redirect 1
Route::get('/test24/id', function () {
  if (route('name is route 24') === url()->full()) {
    return redirect()->route('name is route 24', ['route' => '24']);
  } else {
    echo 'else 24';
  }
})->name('name is route 24');
//Named Routes for page with redirect 2
Route::get('/test25/id', function () {
  if (route('name is route 25') === url()->full()) {
    return to_route('name is route 25', ['route' => '25']);
  } else {
    echo 'else 25';
  }
})->name('name is route 25');
//Named Routes in middleware
Route::get('/test26')->middleware(['middle26', 'signed'])->name('name is route 26');
//Route Groups in kernel file
Route::get('/test27')->middleware('middle27');
//Route Groups with middleware method
Route::middleware(['middle28_1', 'middle28_2'])->group(function () {
  Route::get('/test28_1', function () {
    // Uses first & second middleware...
  })->name('name is route 28_1');

  Route::get('/test28_2', function () {
    // Uses first & second middleware...
  })->name('name is route 28_2');
});
//Route with same controller
Route::controller(Test29Controller::class)->group(function () {
  Route::get('/test29/{id}', 'show');
  Route::post('/test29', 'store')->middleware(['middle29'])->withoutMiddleware(['web']);
});
//subdomain route
Route::get('/', function () {
  return 'First sub domain' . ' blog.' . env('APP_URL');
})->domain('blog.' . env('APP_URL'));
Route::domain('blog.' . env('APP_URL'))->group(function () {
  Route::get('test30', function () {
    return 'Second subdomain landing page';
  });
  Route::get('test30/{id}', function ($id) {
    return 'Test30 ' . $id . ' in second subdomain';
  });
});
//Route Prefixes
Route::prefix('admin')->group(function () {
  Route::get('/test31', function () {
    //http://localhost:8000/admin/test31
    return 'Test31 url = ' . url()->full();
  });
});
//Route Name Prefixes
Route::name('admin.')->group(function () {
  Route::get('/test32', function () {
    //http://localhost:8000/test32
    // Route assigned name "admin.users"...
    return 'Test32 url = ' . url()->full() . ', route name ' . route('admin.users');
  })->name('users');
});

//Implicit Binding with route
Route::get('/test33/{user}', function (User $user) {
  return 'Test33 email = ' . $user->email;
});
//Implicit Binding with controller
Route::post('/test34/{id}', [Test34Controller::class, 'show'])->withoutMiddleware(['web']);
//Customizing The Key(search column)
Route::get('/test35/{user:name}', function (User $user) {
  //http://localhost:8000/test35/hooi
  return 'Test35 user = ' . $user;
});
//Customizing The Key(search column) by model
Route::get('/test36/{user}', function (Test36 $user) {
  //http://localhost:8000/test36/hooi@gmail.com
  return 'Test36 user = ' . $user;
});
//Customizing The Key(search column) with multiple parameter
Route::get('/test37/{user}/test37_1/{migration}', function (Test36 $user, Test37 $migration) {
  //http://localhost:8000/test37/hooi@gmail.com/test37_1/2019_08_19_000000_create_failed_jobs_table
  return 'Test37 user = ' . $user . ', migration = ' . $migration;
});
//Customizing The Key(search column) with multiple parameter
Route::get('/test38/{user}/test38_1/{migration}', function (User $user, Migration $migration) {
  //http://localhost:8000/test38/1/test38_1/2019_08_19_000000_create_failed_jobs_table
  return 'Test38 user = ' . $user . ', migration = ' . $migration;
})->scopeBindings();

require __DIR__ . '/auth.php';

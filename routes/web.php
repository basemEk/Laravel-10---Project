<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;

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

    //fetch all users:
    // $users = DB::select('select * from users where id=1');

    // $users = DB::insert('insert into users (`user-name`, email, password) values (?, ?, ?)', 
    
    // ['Marc', 'mark-z1@test.com', 'mark123']);

        // UPDATE A RECORD
    // $users = DB::update(
    //     'update users set email = ? where id = ?',
    //     ['abcd@test.com', 3]
    // );

        // DELETE A RECORD
    // $user = DB::delete('delete from users where id = 3');
    

    // all users:
    // $users = DB::select('select * from users');

    //  or by email:
    //  $users = DB::select('select * from users where email=?', ['basem.kreidly@gmail.com']);

    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

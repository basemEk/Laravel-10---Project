<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    // return view('welcome');

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




    // CRUD OPERATIONS USING QUERY BUILDER

    // $users = DB::table('users')->get();     //instead of select
        
    // $users = DB::table('users')->where('id', 9)->get();    //using where

    // $user = DB::table('users')->insert([             //insert new user + hashing its password
    //     'user-name' => 'Bob',
    //     'email' => 'bob@hotmail.com',
    //     'password' => Hash::make('bob123')
    // ]);

    // $user = DB::table('users')->where('id', 10)->delete();      //delete one specific record
    
    // $user = DB::table('users')
    //           ->where('id', 2)
    //           ->update(['email' => 'bassem-kreidly@hotmail.com']);

    // $user = DB::table('users')->first();

    // $user = DB::table('users')->find(1);




    // CRUD OPERATIONS WITH ELOQUENT MODELS

    // $users = User::where('id', 1)->first();

    // $users = User::create([
    //     'name' => 'Samar',
    //     'email' => 'samar505@gmail.com',
    //     'password' => 'samar123'
    // ]);

    // $users = User::find(25);
    // $users->update([
    //     'name' => 'Tarekk',
    //     'email' => 't_saleh13@gmail.com',
    //     'password' => bcrypt('hisham123')
    // ]);

    // $users = User::find(25);
    // $users->update([
    //     'name' => 'Tarekk',
    //     'email' => 't_saleh13@gmail.com',
    //     'password' => bcrypt('hisham123')
    // ]);

    // $users = User::find(1);
    // $users->delete();

    // $users = User::all();


    // dd($users);

    $users = User::find(2);
    dd($users->name);


    // $user = User::create(['user-name' => 'Jack', 'email' => 'jack11@test.com', 'password' => 'jack123']); 
    // dd($users->{'user-name'});


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
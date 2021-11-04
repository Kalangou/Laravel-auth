<?php

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
| Systeme d'authentification automatique : Larave Breeze
| Installation :  composer require laravel/breeze --dev
| Installation : php artisan breeze:install
|
| Ajout d'un nouveau champs dans une table : php artisan make:migration add_admin_column_to_users_tables --table=users
|
| Envoie de mail ----
| Creation de la classe: php artisan make:mail NomClass
| MarkdownMail : php artisan make:mail MarkdownMail -m le_fichier_blade
|
|
|
|
|
|
|
|
|
|
|
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['admin'])->group(function()
{
    Route::get('/foo', '\App\Http\Controllers\TestController@foo');
    Route::get('/bar', '\App\Http\Controllers\TestController@bar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\NewsComponent;
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

Route::group(
    [
        'prefix' => \LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/{id?}',NewsComponent::class)->name('home');
        Route::get('/news/category/',CategoryComponent::class)->name('category');
        Route::get('/news/contact/',ContactComponent::class)->name('contact');
        Route::get('/detail/{id?}',DetailsComponent::class)->name('detail');

        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified'
        ])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
        });
    });





<?php

use App\Http\Controllers\admin\AddressController;
use App\Http\Controllers\admin\CardsController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\admin\ConfigController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BuysController;
use App\Http\Controllers\admin\CategotyController;
use App\Http\Controllers\BuysController as ControllersBuysController;
use App\Mail\TestMail;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return redirect()->route('dashboard', 'all');
});

Route::get('/paypal/pay', [PaymentController::class, 'payWithPayPal'])->name('pay');
Route::get('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('execute');

require __DIR__.'/auth.php';

Route::post('/dashboard/search/', [IndexController::class, 'search'])->name('buscar');

Route::get('/dashboard/{id}/{search?}', [IndexController::class, 'index'])->name('dashboard');

Route::get('/card/{id}', [IndexController::class, 'card'])->name('card');

Route::get('/card/{id}/buy', [IndexController::class, 'buyCard'])->name('buy.card');

//Route::get('/buy', [ControllersBuysController::class, 'index'])->name('buy');

Route::resource('carrito', CarritoController::class);

Route::get('carrito/{carrito_id}/{card_id}/add', [CarritoController::class, 'add'])->name('add');
Route::get('carrito/{carrito_id}/{card_id}/sub', [CarritoController::class, 'sub'])->name('sub');
Route::get('limpiar/carrito', [CarritoController::class, 'limpiar'])->name('limpiar');

Route::post('order', [CarritoController::class, 'create'])->name('order');


// Route::get('/correo', function () {

//     $data = ['name' => 'Para Rami'];

//     Mail::to('carlos.bramila98@gmail.com')->send(new TestMail($data));

//     return "Correo enviado";

// });


Route::prefix('/admin')->middleware('auth')->group(function(){

    Route::get('/', [ConfigController::class, 'index'])->name('admin');

    // Route::get('/users', [UsersController::class, 'index'])->name('users');
    // Route::get('/users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

    Route::resource('recipient', UsersController::class);
    Route::get('/recipient/{recipient}', [UsersController::class, 'delete'])->name('recipient.delete');

    Route::get('/user', [UsersController::class, 'pass'])->name('pass');
    Route::post('/user', [UsersController::class, 'pass_edit'])->name('pass.edit');

    Route::get('/category', [CategotyController::class, 'index'])->name('category');
    Route::post('/category/create', [CategotyController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/delete', [CategotyController::class, 'delete'])->name('category.delete');

    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
    Route::post('/addresses/create', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('/addresses/{id}/delete', [AddressController::class, 'delete'])->name('addresses.delete');

    Route::get('/cards', [CardsController::class, 'index'])->name('cards');
    // Route::get('/cards/buscar', [CardsController::class, 'buscar'])->name('buscar');
    Route::get('/cards/{id}/filter', [CardsController::class, 'filter'])->name('filter');
    Route::get('/cards/create', [CardsController::class, 'create'])->name('cards.create');
    Route::get('/cards/{card}/edit', [CardsController::class, 'edit'])->name('cards.edit');
    Route::post('/cards/create', [CardsController::class, 'store'])->name('cards.store');
    Route::post('/cards/{card}/update', [CardsController::class, 'update'])->name('cards.update');
    Route::post('/cards/{card}/photo', [CardsController::class, 'photo'])->name('cards.photo');
    Route::get('/cards/{id}/delete', [CardsController::class, 'delete'])->name('cards.delete');
    Route::get('/cards/{id}/{public}', [CardsController::class, 'public'])->name('cards.public');

    Route::get('/gallery/{id}', [CardsController::class, 'gallery'])->name('gallery');
    Route::post('/gallery/{id}/create', [CardsController::class, 'photos'])->name('gallery.create');
    Route::get('/gallery/{id}/delete', [CardsController::class, 'delete_photos'])->name('gallery.delete');

    Route::get('/buys', [BuysController::class, 'index'])->name('buys');
    Route::get('/buys/{id}/limpiar', [BuysController::class, 'limpiar'])->name('buys.limpiar');
    Route::get('/buys/{id}/delete', [BuysController::class, 'delete'])->name('buys.delete');

    Route::get('/config', [ConfigController::class, 'config'])->name('config');
    Route::post('/config/update', [ConfigController::class, 'store'])->name('config.update');
    Route::get('/fondos', [ConfigController::class, 'fondo'])->name('fondos');
    Route::post('/fondos', [ConfigController::class, 'fondos'])->name('fondos.store');
    Route::post('/tema', [ConfigController::class, 'tema'])->name('tema');


});

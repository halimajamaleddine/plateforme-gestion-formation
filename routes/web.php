<?php

use App\Models\Formateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    $formateurs = Formateur::all();
    return view('tables', compact('formateurs'));
})->name('tables')->middleware('auth');


Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])->name('sign-up')->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/session-formation', function () {
    return view('laravel-examples.session-formation');
})->name('session.formation')->middleware('auth');

Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/inscription', [UserController::class, 'update'])->name('inscription.update');
Route::put('/updateinformation', [UserController::class, 'acceptInFormation'])->name('inscription.acceptInFormation');

Route::get('/account-pages/formation-management', [FormateurController::class, 'index'])->name('formateurs-management')->middleware('auth');
Route::get('/account-pages/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
Route::post('/account-pages/formateur-add', [FormateurController::class, 'store'])->name('Ajouter.formateur')->middleware('auth');
Route::get('/account-pages/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
Route::get('/account-pages/attestation', [AttestationController::class, 'index'])->name('attestation');

Route::put('/formateurs/{formateur}', [FormateurController::class, 'update'])->name('formateurs.update')->middleware('auth');
Route::get('/formateurs/{formateur}/edit', [FormateurController::class, 'edit'])->name('formateurs.edit')->middleware('auth');
Route::delete('/formateurs/{formateur}', [FormateurController::class, 'destroy'])->name('formateurs.destroy')->middleware('auth');

Route::get('/admin/reservation',[ReservationController::class,'index'])->name('reservation.index')->middleware('auth');
Route::get('/admin/session',[SessionController::class,'index'])->name('session.index')->middleware('auth');


// Route::get('/tables', [FormateurController::class, 'index'])->name('tables')->middleware('auth');

<?php

use App\Models\Formateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisterController;

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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// Routes d'authentification
Route::get('/sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('sign-up');
Route::post('/sign-up', [RegisterController::class, 'store'])->middleware('guest')->name('sign-up');

Route::get('/sign-in', [LoginController::class, 'create'])->middleware('guest')->name('sign-in');
Route::post('/sign-in', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest');

// Route de la page de succès
Route::get('/success-page', function () {
    return view('sucess-page');
})->name('sucess-page');

// Route de la page d'accueil redirigeant vers le tableau de bord
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [InscriptionController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/inscription', [InscriptionController::class, 'inscription'])->name('inscription');
    Route::get('/dashboard/session', [InscriptionController::class, 'sessionUser'])->name('session.formation');


    Route::get('/tables', function () {
        $formateurs = Formateur::all();
        return view('tables', compact('formateurs'));
    })->name('tables');

    Route::get('/profile', [PostController::class, 'index'])->name('profile');
});

// Routes pour les vues d'inscription et de connexion non utilisées
Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

// Routes de vérification d'email
Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Email de vérification envoyé!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/inscription', [UserController::class, 'update'])->name('inscription.update');
Route::put('/updateinformation', [UserController::class, 'acceptInFormation'])->name('inscription.acceptInFormation');

Route::get('/account-pages/formation-management', [FormateurController::class, 'index'])->name('formateurs-management')->middleware('auth');
Route::get('/account-pages/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
Route::post('/account-pages/formateur-add', [FormateurController::class, 'store'])->name('Ajouter.formateur')->middleware('auth');
Route::get('/account-pages/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
Route::get('/account-pages/attestation', [AttestationController::class, 'index'])->name('listeAttestation')->middleware('auth');
Route::get('/account-pages/listeAttestation/{id}', [AttestationController::class, 'show'])->name('attestation')->middleware('auth');

Route::post('/users/accept-selected', [UserController::class, 'acceptSelected'])->name('users.acceptSelected');

Route::put('/formateurs/{formateur}', [FormateurController::class, 'update'])->name('formateurs.update')->middleware('auth');
Route::get('/formateurs/{formateur}/edit', [FormateurController::class, 'edit'])->name('formateurs.edit')->middleware('auth');
Route::delete('/formateurs/{formateur}', [FormateurController::class, 'destroy'])->name('formateurs.destroy')->middleware('auth');

Route::get('/admin/reservation', [ReservationController::class, 'index'])->name('reservation')->middleware('auth');
Route::get('/admin/session', [SessionController::class, 'index'])->name('session.index')->middleware('auth');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');

Route::resource('users', UserController::class);
Route::resource('inscriptions', InscriptionController::class);
Route::resource('sessions', SessionController::class);
// Route::get('/tables', [FormateurController::class, 'index'])->name('tables')->middleware('auth');


Route::post('/attestation/bulk', [AttestationController::class, 'bulkPrint'])->name('attestation.bulk');

Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::put('/inscription/acceptInFormation', [ReservationController::class, 'updateReservationStatus'])->name('inscription.acceptInFormation');
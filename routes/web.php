<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\PublicInvitationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page (UI keren)
Route::get('/', function () {
    return view('landing');
})->name('home');

// Setelah login, arahkan ke admin invitations
Route::get('/dashboard', function () {
    return redirect()->route('admin.invitations.index');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Invitations
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/invitations', [InvitationController::class, 'index'])
        ->name('admin.invitations.index');

    Route::get('/invitations/create', [InvitationController::class, 'create'])
        ->name('admin.invitations.create');

    Route::post('/invitations', [InvitationController::class, 'store'])
        ->name('admin.invitations.store');

    Route::get('/invitations/{invitation}/edit', [InvitationController::class, 'edit'])
        ->name('admin.invitations.edit');

    Route::put('/invitations/{invitation}', [InvitationController::class, 'update'])
        ->name('admin.invitations.update');

    Route::post('/invitations/{invitation}/publish', [InvitationController::class, 'publish'])
        ->name('admin.invitations.publish');
});

/*
|--------------------------------------------------------------------------
| Public Invitation
|--------------------------------------------------------------------------
*/

Route::get('/u/{slug}', [PublicInvitationController::class, 'show'])
    ->name('public.invitation.show');

require __DIR__.'/auth.php';

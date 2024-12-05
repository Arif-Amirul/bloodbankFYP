<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Donor\DonorPage;
use App\Http\Livewire\Donation\DonationPage;
use App\Http\Livewire\ViewDonate\ViewDonatePage;
use App\Http\Livewire\BloodTestPage\BloodTestPage;
use App\Http\Livewire\ViewDonor\ViewDonorPage;
use App\Http\Livewire\ViewBloodTest\ViewBloodTestPage;
use App\Http\Livewire\RegisterUser\RegisterUserPage;
use App\Http\Livewire\Patient\PatientPage;
use App\Http\Livewire\ViewPatient\ViewPatientPage;
use App\Http\Livewire\BloodTransfer\BloodTransferPage;
use App\Http\Livewire\ViewBloodRequest\ViewBloodRequestPage;

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

Route::middleware('guest')->group(function () {
    Route::get('/', Login::class);

    Route::get('login', Login::class)
        ->name('login');

    // Route::get('register', Register::class)
    //     ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::get('home', Home::class)->name('home');
    Route::get('donor-page', DonorPage::class)->name('donor-page');
    Route::get('donation-page', DonationPage::class)->name('donation-page');
    Route::get('view-donate-page', ViewDonatePage::class)->name('view-donate-page');
    Route::get('blood-test-page', BloodTestPage::class)->name('blood-test-page');
    Route::get('patient-page', PatientPage::class)->name('patient-page');
    Route::get('view-donor-page', ViewDonorPage::class)->name('view-donor-page');
    Route::get('view-blood-test-page', ViewBloodTestPage::class)->name('view-blood-test-page');
    Route::get('register-user-page', RegisterUserPage::class)->name('register-user-page');
    Route::get('blood-transfer-page', BloodTransferPage::class)->name('blood-transfer-page');
    Route::get('view-patient-page', ViewPatientPage::class)->name('view-patient-page');
    Route::get('view-blood-request-page', ViewBloodRequestPage::class)->name('view-blood-request-page');
});

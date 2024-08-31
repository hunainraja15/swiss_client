<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StepTwoController;
use App\Http\Controllers\QnaController;

// Route for the homepage
Route::get('/', function () {
    return view('index');
});

// Authentication routes provided by Laravel
Auth::routes();

// Routes that require user authentication
Route::middleware(['auth'])->group(function () {

    // Route to the home page after login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route to generate dashboard report
    Route::post('/report/dashboard', [HomeController::class, 'report_dashboard'])->name('report.dashboard');

    // Routes to update and check user status
    Route::post('/user/status/update', [UserController::class, 'status_update'])->name('user.status.update');
    Route::post('/user/status', [UserController::class, 'status'])->name('user.status');

    // Route to show user profile
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');

    // Routes for folder management
    Route::get('/folder', [FolderController::class, 'index'])->name('folder.index'); // Show all folders
    Route::post('/folder/store', [FolderController::class, 'store'])->name('folder.store'); // Store a new folder
    Route::get('/folder/open/{folder}', [FolderController::class, 'open'])->name('folder.open'); // Open a specific folder
    Route::get('/folder/delete/{folder}', [FolderController::class, 'delete'])->name('folder.delete'); // Delete a folder

    // Routes for file management
    Route::post('/file/store', [FileController::class, 'store'])->name('file.store'); // Store a new file
    Route::post('/file/new/store', [FileController::class, 'new_store'])->name('file.new.store'); // Store a new file with a different method
    Route::get('/file/delete/{file}', [FileController::class, 'delete'])->name('file.delete'); // Delete a file

    // Route to access settings
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');

    // Route to access account details
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    // Route to access account user show
    Route::get('/account/show/{id}', [AccountController::class, 'show'])->name('account.show');

    // Route for handling Stripe payments
    Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

    // Route for QNA
    Route::get('qna', [QnaController::class, 'index'])->name('qna.index');
});

// Resource route for user-related operations (index, create, store, etc.)
Route::resource('user', UserController::class);

// Route for user login
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

// Routes for payment management
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index'); // Show payment page
Route::post('/payment/pay', [PaymentController::class, 'pay'])->name('payment.pay'); // Process payment

// Route for user verification
Route::get('/user/verify', [UserController::class, 'verify'])->name('user.verify');

// Routes for Two-Factor Authentication (2FA)
Route::post('/2fa/enable', [StepTwoController::class, 'send_email'])->name('send.email'); // Enable 2FA by sending an email
Route::post('/2fa/verify1', [StepTwoController::class, 'verifyTwoFactor'])->name('verify.step.factor1'); // Verify 2FA code

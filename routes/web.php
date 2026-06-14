<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController as VisitorPackageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/paket-wisata', [VisitorPackageController::class, 'index'])->name('visitor.packages');

// Auth Routes (Visitor)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Booking Routes (Auth Required)
Route::middleware('auth.user')->group(function () {
    Route::get('/booking/{package}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{package}', [BookingController::class, 'store'])->name('booking.store');

// Payment Routes (Auth Required)
Route::middleware('auth')->group(function () {
    Route::get('/payment/{booking}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{booking}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/pesanan-saya', [\App\Http\Controllers\BookingController::class, 'myOrders'])->name('my-orders');
});
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Auth (Admin Guest only)
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    });

    // Admin Protected Routes
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::patch('/booking/{booking}/status', [\App\Http\Controllers\Admin\DashboardController::class, 'updateStatus'])->name('booking.status');
        Route::delete('/booking/{booking}', [\App\Http\Controllers\Admin\DashboardController::class, 'destroy'])->name('booking.destroy');
        Route::patch('/payment/{payment}/verify', [\App\Http\Controllers\Admin\DashboardController::class, 'verifyPayment'])->name('payment.verify');

        // Edit Beranda
        Route::get('/edit-beranda', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('pages.edit');
        Route::put('/edit-beranda', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('pages.update');

        // Package Management
        Route::resource('packages', PackageController::class)->except(['show']);
        Route::patch('/packages/{package}/availability', [PackageController::class, 'toggleAvailability'])->name('packages.availability');
    });
});

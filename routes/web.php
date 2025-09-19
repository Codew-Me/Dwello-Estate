<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AgentController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [PropertyController::class, 'search'])->name('search');

// Public property routes
Route::get('/properties', [PropertyController::class, 'publicIndex'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'publicShow'])->name('properties.show');

// Public agent routes
Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
Route::get('/agents/{agent}', [AgentController::class, 'show'])->name('agents.show');

// Contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard routes
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    
    // User routes
    Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/user/inquiries', [InquiryController::class, 'userIndex'])->name('user.inquiries.index');
    Route::get('/user/messages', [MessageController::class, 'userIndex'])->name('user.messages.index');
    
    // Admin routes
    Route::middleware('admin')->group(function () {
        // User management
        Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users.index');
        Route::delete('/admin/users/{user}', [DashboardController::class, 'destroyUser'])->name('admin.users.destroy');
        
        // Admin management
        Route::get('/admin/admins', [DashboardController::class, 'admins'])->name('admin.admins.index');
        Route::get('/admin/admins/create', [DashboardController::class, 'createAdmin'])->name('admin.admins.create');
        Route::post('/admin/admins', [DashboardController::class, 'storeAdmin'])->name('admin.admins.store');
        
        // Inquiry management
        Route::get('/admin/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/admin/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::delete('/admin/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
        
        // Message management
        Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/admin/messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');
        Route::delete('/admin/messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
        
        // Agent management
        Route::get('/admin/agents', [AgentController::class, 'adminIndex'])->name('admin.agents.index');
        Route::get('/admin/agents/create', [AgentController::class, 'create'])->name('admin.agents.create');
        Route::post('/admin/agents', [AgentController::class, 'store'])->name('admin.agents.store');
        Route::get('/admin/agents/{agent}/edit', [AgentController::class, 'edit'])->name('admin.agents.edit');
        Route::patch('/admin/agents/{agent}', [AgentController::class, 'update'])->name('admin.agents.update');
        Route::delete('/admin/agents/{agent}', [AgentController::class, 'destroy'])->name('admin.agents.destroy');
    });
});

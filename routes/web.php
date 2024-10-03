<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MedicineOrderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'can:manage-staff']], function () {
        Route::get('/list', [StaffController::class, 'index'])->name('staff.index');
        Route::get('/create', [StaffController::class, 'create'])->name('staff.create');
        Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
        Route::delete('/delete/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
    });

    Route::group(['prefix' => 'patient', 'middleware' => ['auth', 'can:manage-patient']], function () {
        Route::get('/list', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
        Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::delete('/delete/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');
    });

    Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'can:manage-doctor']], function () {
        Route::get('/list', [DoctorController::class, 'index'])->name('doctor.index');
        Route::get('/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::delete('/delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    });

    Route::group(['prefix' => 'medical_record'], function () {
        Route::get('/list', [MedicalRecordController::class, 'index'])->name('medical_record.index');
        Route::get('/create', [MedicalRecordController::class, 'create'])->name('medical_record.create');
        Route::get('/edit/{id}', [MedicalRecordController::class, 'edit'])->name('medical_record.edit');
        Route::delete('/delete/{id}', [MedicalRecordController::class, 'destroy'])->name('medical_record.destroy');
    });

    Route::group(['prefix' => 'medicine', 'middleware' => ['auth', 'can:manage-staff']], function () {
        Route::get('/list', [MedicineController::class, 'index'])->name('medicine.index');
        Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
    });

    Route::group(['prefix' => 'billing', 'middleware' => ['auth', 'can:manage-billing']], function () {
        Route::get('/list', [BillingController::class, 'index'])->name('billing.index');
        Route::delete('/delete/{id}', [BillingController::class, 'destroy'])->name('billing.destroy');
    });

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/list', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::delete('/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    });

    Route::group(['prefix' => 'medicine_order', 'middleware' => ['auth', 'can:manage-staff']], function () {
        Route::get('/list', [MedicineOrderController::class, 'index'])->name('medicine_order.index');
        Route::get('/create', [MedicineOrderController::class, 'create'])->name('medicine_order.create');
        Route::delete('/delete/{id}', [MedicineOrderController::class, 'destroy'])->name('medicine_order.destroy');
    });

    Route::group(['prefix' => 'management', 'middleware' => ['auth', 'can:only-admin']], function () {
        Route::get('/user', [UserController::class, 'index'])->name('management.user_index');
        Route::get('/create', [UserController::class, 'create'])->name('management.user_create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('management.user_edit');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('management.user_destroy');
        Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    });

    // Route::get('/send-notification', [NotificationController::class, 'createNotification'])->name('send.notification');


    Gate::define('manage-staff', function ($user) {
        return $user->hasRole(config('system.roles.admin')) || $user->hasRole(config('system.roles.staff'));
    });

    Gate::define('manage-billing', function ($user) {
        return $user->hasRole(config('system.roles.admin')) || $user->hasRole(config('system.roles.staff')) || $user->hasRole(config('system.roles.patient'));
    });

    Gate::define('manage-patient', function ($user) {
        return $user->hasRole(config('system.roles.admin')) || $user->hasRole(config('system.roles.patient'));
    });

    Gate::define('manage-doctor', function ($user) {
        return $user->hasRole(config('system.roles.admin')) || $user->hasRole(config('system.roles.doctor'));
    });

    Gate::define('only-admin', function ($user) {
        return $user->hasRole(config('system.roles.admin'));
    });
});

// Define your resource routes
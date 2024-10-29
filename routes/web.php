<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ClientAppController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for creating forms
Route::get('/create-form', [FormController::class, 'create']);
Route::post('/create-form', [FormController::class, 'create']);

// Routes for managing clients
Route::get('/clients', [ClientAppController::class, 'manageClients']);
Route::post('/clients', [ClientAppController::class, 'manageClients']);

// Routes for managing apps specifically for a client
Route::get('/clients/{clientId}/apps', [ClientAppController::class, 'manageApps']);
Route::post('/clients/{clientId}/apps', [ClientAppController::class, 'manageApps']);

// Routes for data export
Route::get('/clients/export', [ClientAppController::class, 'exportClients'])->name('clients.export');

<?php

use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ProviderController;

// Subscribers
Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
Route::post('/subscribers', [SubscriberController::class, 'store'])->name('subscribers.store');

// Add other routes for edit, update, delete for Subscribers
Route::get('/subscribers/{subscriber}/edit', [SubscriberController::class, 'edit'])->name('subscribers.edit');
Route::put('/subscribers/{subscriber}', [SubscriberController::class, 'update'])->name('subscribers.update');
Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

// Providers
Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/create', [ProviderController::class, 'create'])->name('providers.create');
Route::post('/providers', [ProviderController::class, 'store'])->name('providers.store');

// Add other routes for edit, update, delete for Providers
Route::get('providers/{provider}/edit', [ProviderController::class, 'edit'])->name('providers.edit');
Route::put('providers/{provider}', [ProviderController::class, 'update'])->name('providers.update');
Route::delete('/providers/{provider}', [ProviderController::class, 'destroy'])->name('providers.destroy');



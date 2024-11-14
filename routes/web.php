<?php

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/book/{id}', [App\Http\Controllers\HomeController::class, 'showBook'])->name('book.show');
Route::post('/book', [App\Http\Controllers\HomeController::class, 'store'])->name('book.store');
Route::delete('/book/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('book.delete');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('book.search');
Route::get('/new-books', [App\Http\Controllers\NewBooksController::class, 'index'])->name('new-books');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');


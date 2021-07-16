<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventRegisterController;

//  Frontend Pages
Route::get('/', function () {
    return view('home')->name('home');
});
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
// Route::get('/books', [PageController::class, 'books'])->name('books');
Route::get('/ministry', [PageController::class, 'ministry'])->name('ministry');
Route::get('/philantropy', [PageController::class, 'philantropy'])->name('philantropy');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'email']);
// Test Email
Route::get('/email', function(){
    Mail::to('o3cloudng@gmail.com')->send(new ContactMail());
   return new ContactMail();
}); // End Test Email Link
// Clear Cache
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    // return what you want
});



// Books
// Route::resource('/books', BookController::class);
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/books/add', [BookController::class, 'create'])->name('books.add');
Route::post('/books/add', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Verify Transaction
Route::get('/verify/{reference}', [BookController::class, 'verify']);


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/addevent', [EventController::class, 'create'])->name('event.create');
Route::post('/addevent', [EventController::class, 'store']);
Route::get('/event/register', [EventRegisterController::class, 'create'])->name('event.register');
Route::post('/event/register', [EventRegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::view('profile', 'auth.profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    // List of Event Registrations
    Route::get('/event/list', [EventRegisterController::class, 'index'])->name('register.list');
});


require __DIR__.'/auth.php';

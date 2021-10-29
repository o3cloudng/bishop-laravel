<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
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
Route::get('/books', [BookController::class, 'index'])->name('books');

// Verify Transaction


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
        
    Route::get('/ebook/show/{id}', [ContentController::class, 'showebook'])->name('showebook');
    Route::get('/verify/{reference}', [BookController::class, 'verify']);
    Route::post('/ebook/show/{id}', [ContentController::class, 'sub_transaction']);
    
    Route::get('/myprofile', [ContentController::class, 'myprofile'])->name('myprofile');
    
    Route::post('/subscription', [ContentController::class, 'sub_transaction']);
    Route::get('/ebook/verify/{reference}', [ContentController::class, 'verify']);

    Route::view('profile', 'auth.profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    // List of Event Registrations
    Route::get('/event/list', [EventRegisterController::class, 'index'])->name('register.list');
    // Route::get('readonline/{id}', [ContentController::class, 'readonline'])->name('readonline');
    Route::get('/readbook/{bookId}/{chapter}', [ContentController::class, 'readbook'])->name('readbook');
    Route::get('/books/admin/show/{id}', [BookController::class, 'chapter'])->name('admin.book.show');
    Route::post('/books/admin/show/{id}', [BookController::class, 'addchapter']);
    Route::get('/books/admin/content/{id}', [ContentController::class, 'addcontent'])->name('admin.book.addcontent');

    // READ BOOK ONLINE
    Route::get('/ebook/online/{book_id}', [ContentController::class, 'readonline'])->name('readonline');
    Route::post('/ebook/online/{id}', [ContentController::class, 'readonline']);
    Route::get('/ebooks/content/{id}', [ContentController::class, 'readchapter'])->name('readchapter');


    Route::group(['middleware' => 'checkadmin'], function(){

        // Route::get('/dashboard', function(){
        //     return view('dashboard');
        // })->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        # Admin
        Route::get('/booklist', [BookController::class, 'booklist'])->name('booklist');
        Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
        Route::post('/books/update/{id}', [BookController::class, 'update']);
        // Route::get('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
        Route::post('/books/delete', [BookController::class, 'destroy'])->name('books.destroy');

        // Books
        
        Route::get('/books/add', [BookController::class, 'create'])->name('books.create');
        Route::post('/books/add', [BookController::class, 'store']);
        Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    });
});


// 

// Test Email
Route::get('/email', function(){
    Mail::to('o3cloudng@gmail.com')->send(new ContactMail());
   return new ContactMail();
}); // End Test Email Link

// Clear Cache
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Config cache</h1>';
});
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});



require __DIR__.'/auth.php';

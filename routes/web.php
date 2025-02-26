 <?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

// Route::middleware(['admin'])->group(function () {
    // });

                    //AdminRoutes
Route::get('/',[AdminController::class,'home']);
Route::get('/home',[AdminController::class, 'index'])->name('home');
Route::get('/all_messages',[AdminController::class,'all_messages'])->middleware('Admin','auth');
Route::get('/send_mail/{id}',[AdminController::class,'send_mail'])->middleware('Admin');
Route::post('/mail/{id}', [AdminController::class, 'mail']);
                    //Room Routes
Route::get('/create_room',[RoomController::class, 'create_room'])->middleware('Admin');
Route::post('/store_room',[RoomController::class, 'store_room'])->middleware('Admin');
Route::get('/view_room',[RoomController::class, 'view_room'])->middleware('Admin');
Route::get('/room_delete/{id}',[RoomController::class, 'room_delete'])->middleware('Admin');
Route::get('/room_update/{id}',[RoomController::class, 'room_update'])->middleware('Admin');
Route::post('/edit_room/{id}',[RoomController::class, 'edit_room'])->middleware('Admin');
Route::get('/search', [RoomController::class, 'search'])->name('search')->middleware('Admin');
Route::get('/room_available/{id}',[RoomController::class,'room_available'])->middleware('Admin');
Route::get('/room_maintenance/{id}',[RoomController::class,'room_maintenance'])->middleware('Admin');
Route::get('/room_booked/{id}',[RoomController::class,'room_booked'])->middleware('Admin');

Route::get('/room_details/{id}',[HomeController::class, 'room_details'])->middleware('auth');
                        //BookingRoutes
Route::get('/bookings',[BookController::class, 'bookings'])->middleware('Admin','auth');
Route::get('/delete_booking/{id}',[BookController::class, 'delete_booking'])->middleware('Admin');
Route::get('/approve_booking/{id}',[BookController::class, 'approve_booking'])->middleware('Admin');
Route::get('/cancel_booking/{id}',[BookController::class, 'cancel_booking'])->middleware('Admin');
Route::post('/add_booking/{id}',[BookController::class, 'add_booking'])->middleware('auth');


                         //GalleryRoutes
Route::get('/view_Gallery',[GalleryController::class,'view_Gallery'])->middleware('Admin');
Route::post('/upload_gallery',[GalleryController::class,'upload_gallery'])->middleware('Admin');
Route::get('/delete_gallery/{id}',[GalleryController::class,'delete_gallery'])->middleware('Admin');

                        //ContatcRoutes
Route::post('/contact',[ContactController::class,'contact'])->middleware('auth');


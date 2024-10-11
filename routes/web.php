<?php
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Authentication Routes
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register']);
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Home (protected route)
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

    //Notification 
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    //Admin
    Route::get('/admin/view', [AdminController::class, 'view'])->name('admin.view');

    //User View
    Route::get('/users/index', [RegisterController::class,'showAllUsers'])->name('users.index');

// Route for activity registration (create)
Route::post('/activities', [ActivityController::class, 'add'])->name('activities.store');
// Route to get all activities (view)
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
// Route to get a single activity by ID (view)
Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
// Route to create new activity (show create form)
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
// Route to update an activity by ID
Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
// Route to edit an activity by ID
Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
// Route to delete an activity by ID
Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
});
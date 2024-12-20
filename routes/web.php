<?php

use App\Http\Controllers\EmployeeResponseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\EmployeeVacancyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfilePreferencesController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/video', function () {
    return view('video');
})->name('video');

Route::get('/dashboard', function () {
    return redirect()->route('profile.edit'); // Replace 'profile.show' with your profile route name
})->middleware(['auth', 'verified'])->name('dashboard');

Route::patch('/vacancies/{vacancy}/toggle-status', [VacancyController::class, 'toggleStatus'])
    ->name('vacancies.toggleStatus');



Route::middleware('auth')->group(function () {
    // Profile-related routes
//    Route::resource('profile', ProfileController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  // Profile editing route
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Profile preferences-related routes
    Route::get('/profile/preferences', [ProfilePreferencesController::class, 'index'])->name('profile.preferences');
    Route::post('/profile/preferences', [ProfilePreferencesController::class, 'update'])->name('profile.preferences.update');
});

Route::middleware('auth')->group(function () {
    // Profile preferences-related routes
    Route::get('/profile/preferences', [ProfilePreferencesController::class, 'index'])->name('profile.preferences');
    Route::post('/profile/picture/update', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');
    Route::post('/profile/preferences/update', [ProfilePreferencesController::class, 'update'])->name('profile.preferences.update');
});






// Companies Routes
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

// Employers Routes

// Vacancies Routes
Route::resource('vacancies', VacancyController::class);
Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::get('/vacancies/edit/{vacancyId}', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('/vacancies/{vacancy}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/vacancies/{vacancy}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

// Employee Vacancies Routes
Route::get('/employee-vacancies', [EmployeeVacancyController::class, 'index'])->name('employee-vacancies.index');
Route::get('/employee-vacancies/create', [EmployeeVacancyController::class, 'create'])->name('employee-vacancies.create');
Route::post('/employee-vacancies', [EmployeeVacancyController::class, 'store'])->name('employee-vacancies.store')->middleware('auth');
Route::get('/employee-vacancies/enrolled', [EmployeeVacancyController::class, 'enrolled'])->name('employee-vacancies.enrolled');
Route::get('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'show'])->name('employee-vacancies.show');
Route::get('/employee-vacancies/{employeeVacancy}/edit', [EmployeeVacancyController::class, 'edit'])->name('employee-vacancies.edit');
Route::put('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'update'])->name('employee-vacancies.update');
Route::delete('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'destroy'])->name('employee-vacancies.destroy');

Route::post('/employee/response/{message}', [EmployeeResponseController::class, 'store'])->name('employee.response')->middleware('auth');;

// Employees Routes
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware('auth');;

// routes/web.php
Route::get('employee/message/{message}', [MessageController::class, 'show'])->name('employee.message.view')->middleware('auth');;

Route::get('/employees/viewresponses', [EmployeeVacancyController::class, 'index'])->name('employees.viewresponses') ->middleware('auth');

Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show')->middleware('auth');

Route::post('/update-status', [MessageController::class, 'updateStatus'])->name('update-status');

Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::post('/message/store/{vacancyId}', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/response/{id}', [MessageController::class, 'response'])->name('messages.response');

Route::get('/messages/create/{vacancyId}', [MessageController::class, 'create'])->name('messages.create')->middleware('auth');;

Route::get('/employers/viewvacancies', [VacancyController::class, 'get'])->name('employers.viewvacancies')->middleware('auth');;

Route::get('/profile/preferences', [ProfilePreferencesController::class, 'index'])->name('profile.preferences');
Route::post('/profile/preferences/update', [ProfilePreferencesController::class, 'update'])->name('profile.preferences.update');
Route::get('/preferences', [ProfilePreferencesController::class, 'index'])->name('profile.preferences');
Route::post('/preferences', [ProfilePreferencesController::class, 'update'])->name('profile.preferences.update');
Route::get('/profile/preferences', [ProfilePreferencesController::class, 'index']);

Route::post('/profile/preferences/update', [ProfilePreferencesController::class, 'update'])
    ->name('profile.preferences.update');
Route::get('/profile/preferences', [ProfilePreferencesController::class, 'index'])
    ->name('profile.preferences');

require __DIR__.'/auth.php';

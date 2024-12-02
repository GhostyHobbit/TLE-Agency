<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\EmployeeVacancyController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test', function () {
    return view('employers.sendmessage');
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
Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employers/create', [EmployerController::class, 'create'])->name('employers.create');
Route::post('/employers', [EmployerController::class, 'store'])->name('employers.store');
Route::get('/employers/{employer}', [EmployerController::class, 'show'])->name('employers.show');
Route::get('/employers/{employer}/edit', [EmployerController::class, 'edit'])->name('employers.edit');
Route::put('/employers/{employer}', [EmployerController::class, 'update'])->name('employers.update');
Route::delete('/employers/{employer}', [EmployerController::class, 'destroy'])->name('employers.destroy');

// Vacancies Routes
Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('/vacancies/{vacancy}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/vacancies/{vacancy}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

// Employee Vacancies Routes
Route::get('/employee-vacancies', [EmployeeVacancyController::class, 'index'])->name('employee-vacancies.index');
Route::get('/employee-vacancies/create', [EmployeeVacancyController::class, 'create'])->name('employee-vacancies.create');
Route::post('/employee-vacancies', [EmployeeVacancyController::class, 'store'])->name('employee-vacancies.store');
Route::get('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'show'])->name('employee-vacancies.show');
Route::get('/employee-vacancies/{employeeVacancy}/edit', [EmployeeVacancyController::class, 'edit'])->name('employee-vacancies.edit');
Route::put('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'update'])->name('employee-vacancies.update');
Route::delete('/employee-vacancies/{employeeVacancy}', [EmployeeVacancyController::class, 'destroy'])->name('employee-vacancies.destroy');

// Employees Routes
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

require __DIR__.'/auth.php';

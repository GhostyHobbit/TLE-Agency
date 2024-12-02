<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeVacancy extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'vacancy_id', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['employer_id', 'name', 'hours', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function employeeVacancies()
    {
        return $this->hasMany(EmployeeVacancy::class);
    }
}

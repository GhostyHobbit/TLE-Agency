<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['date', 'time'];

    public function employeeVacancy()
{
    return $this->hasOne(EmployeeVacancy::class);
}
}

<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'employee_vacancy')
            ->withPivot('status', 'message_id')
            ->withTimestamps();
    }
}

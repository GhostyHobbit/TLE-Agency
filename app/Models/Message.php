<?php

// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'vacancy_id', 'content'];

    // Define the relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Define the relationship with Vacancy
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}

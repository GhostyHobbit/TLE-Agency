<?php

// app/Models/Vacancy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = ['name', 'employer_id', 'hours', 'salary'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_vacancy')
            ->withPivot('status', 'message_id')
            ->withTimestamps();
    }

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}

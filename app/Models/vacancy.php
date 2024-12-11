<?php

// app/Models/Vacancy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Vacancy extends Model
{

    protected $fillable = ['name', 'employer_id', 'hours', 'salary'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_vacancy')
            ->withPivot('status', 'message_id')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }


}

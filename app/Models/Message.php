<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeVacancy;



class Message extends Model
{
    use HasFactory;

    // Zorg dat alle relevante velden massaal toewijsbaar zijn
    protected $fillable = ['message', 'date', 'time', 'location'];

    // Als je relaties nodig hebt, kun je ze hier behouden of toevoegen
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employeeVacancies()
    {
        return $this->hasMany(EmployeeVacancy::class, 'message_id');
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}

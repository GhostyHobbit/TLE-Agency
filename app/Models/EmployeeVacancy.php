<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeVacancy extends Model
{
    protected $table = 'employee_vacancy';

    protected $fillable = [
        'user_id', // Correcte kolomnaam
        'vacancy_id',
        'status',
        'message_id',
        'response_id', // Deze ontbreekt in je huidige model
    ];

    /**
     * Relatie met User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relatie met Vacancy
     */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }

    /**
     * Relatie met Response
     */
    public function response()
    {
        return $this->belongsTo(Response::class, 'response_id');
    }

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }

}

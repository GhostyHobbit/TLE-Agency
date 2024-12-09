<?php

// app/Models/EmployeeVacancy.php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeVacancy extends Pivot
{
    protected $table = 'employee_vacancy'; // Specify the pivot table name if it's not the default

    protected $fillable = ['employee_id', 'vacancy_id', 'status', 'message_id'];

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

    public function response()
    {
        return $this->belongsTo(Response::class);
    }

}

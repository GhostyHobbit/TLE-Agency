<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'email'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'adress'];

    public function employers()
    {
        return $this->hasMany(Employer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = ['name', 'city', 'adress'];

    public function employers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employer::class);
    }
}

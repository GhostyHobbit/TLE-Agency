<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define a many-to-many relationship with the Vacancy model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vacancies(): BelongsToMany
    {
        return $this->belongsToMany(
            Vacancy::class, // Het gerelateerde model
            'employee_vacancy', // Tussentabel
            'user_id', // Foreign key in de tussentabel voor de gebruiker
            'vacancy_id' // Foreign key in de tussentabel voor de vacature
        )->withPivot('status', 'message_id', 'response_id'); // Extra kolommen in de tussentabel
    }

    public function messages()
    {
        // Veronderstel dat een bericht een 'user_id' kolom heeft die verwijst naar de id van de gebruiker.
        return $this->hasMany(Message::class);
    }
}

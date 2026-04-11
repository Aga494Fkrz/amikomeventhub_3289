<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
<<<<<<< HEAD
use Database\Factories\UserFactory;
=======
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
=======
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
<<<<<<< HEAD
    /** @use HasFactory<UserFactory> */
=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}

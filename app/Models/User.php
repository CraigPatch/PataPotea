<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
    'name',
    'email',
    'password',
    'phone_number',
    'city',
    'region',
    'role',
];
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    public function items() {
    return $this->hasMany(Item::class);
}
public function claims() {
    return $this->hasMany(Claim::class, 'claimant_id');
}
public function messages() {
    return $this->hasMany(Message::class, 'sender_id');
}

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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

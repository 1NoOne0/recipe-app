<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = ['email', 'username', 'password'];

    // Relationships
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'author', 'email');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_email', 'friend_email')
                    ->withPivot('status', 'started_at');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_email', 'email');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'author_email', 'email');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}

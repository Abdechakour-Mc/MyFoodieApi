<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthday',
        'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function findForPassport($username)
    {
        return $this->where('email', $username)->first();
    }



    public function recipes()
    {
        return $this->hasMany(Recipe::class,'cook_id','id');
    }

    public function reviews()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'cook_id', 'id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }
}

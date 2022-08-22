<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Sanctum\PersonalAccessToken;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $appends = ['is_follows'];
    protected $guarded = ['$id'];

    // satu user mempunyai banyak postingan
    public function myModel() {
        return $this->hasMany(myModel::class, 'id');
    }

    // satu user mempunyai banyak comment
    public function comment() {
        return $this->hasMany(myModel::class, 'id');
    }

     // satu user mempunyai banyak like
    public function like() {
        return $this->hasMany(like::class, 'id');
    }

     // satu user mempunyai banyak savePost
    public function savePost() {
        return $this->hasMany(bookmark::class, 'id');
    }

    // satu followers punya banyak follwoing
    public function follows() {
        return $this->belongsToMany(follows::class);
    }

    // public function getIsFollowsAttribute(){
    //     return $this->follows->where('user_id', auth()->user()->id)->count() > 0;
    // }

    

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

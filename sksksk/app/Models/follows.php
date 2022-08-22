<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follows extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'following_user_id');
    }
}

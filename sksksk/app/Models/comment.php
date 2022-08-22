<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    // satu komentar memiliki satu user
    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // satu komentar memiliki satu post
    public function myModel() {
        return $this->belongsTo(myModel::class, 'post_id', 'id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    // satu user memiliki satu like
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // satu like memiliki satu post
    public function myModel() {
        return $this->belongsTo(myModel::class, 'post_id', 'id');
    }
}

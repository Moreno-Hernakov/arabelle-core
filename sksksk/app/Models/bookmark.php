<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmark extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    // satu user memiliki banyak savePost
    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // bisa savePost banyak postingan
    public function myModel() {
        return $this->belongsTo(myModel::class, 'post_id', 'id');
    }

}

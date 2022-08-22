<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class myModel extends Model
{
    use HasFactory;
    
    protected $fillable = ['body', 'user_id', 'caption'];
    protected $appends = ['is_like', 'is_savedPost'];
    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }

    // satu postingan memiliki satu user
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // satu postingan memliki banyak comment
    public function comment() {
        return $this->hasMany(comment::class, 'post_id');
    }

    // satu postingan memliki banyak Like
    public function like() {
        return $this->hasMany(like::class, 'post_id');
    }

    // satu postingan memliki banyak bookmark user
    public function savedPost() {
        return $this->hasMany(bookmark::class, 'post_id');
    }

    public function getIsLikeAttribute(){
        return $this->like->where('user_id', auth()->user()->id)->count() > 0;
    }

    public function getIsSavedPostAttribute(){
        return $this->savedPost->where('user_id', auth()->user()->id)->count() > 0;
    }
}

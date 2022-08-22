<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myMod extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nisn', 'no_telfon'];
}

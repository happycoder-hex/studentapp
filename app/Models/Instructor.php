<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{

    protected $table = 'instructor';
    protected $primarykey = 'id';
    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'photo'];

    public $timestamps = false;
    
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $table = 'batches';
    protected $primarykey = 'id';
    protected $fillable = ['name', 'course_id', 'start_date'];
    use HasFactory;

    public $timestamps = false;


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

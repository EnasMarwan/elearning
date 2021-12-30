<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory,Notifiable , SoftDeletes;

    protected $fillable = [
        'name', 'description' , 'video' ,'file', 'video_name','file_name','course_id'
    ];

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}

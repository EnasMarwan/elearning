<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable=['name' , 'description' , 'tranier_id' , 'category_id' , 'price' , 'img'];
    
    public function tranier(){
        return $this->belongsTo(Tranier::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('status');
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}

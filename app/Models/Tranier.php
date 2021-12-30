<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tranier extends User
{
    use HasFactory , Notifiable , HasApiTokens;
    protected $fillable =[
        'name','email', 'status','phone','about','telegram','univ','spec', 'img' , 'Country' ,'password','remember_token'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }
}

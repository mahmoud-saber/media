<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable =['user_id','title','image_name','image'];


    public function user()
     {
       return $this->belongsTo(User::class);
     }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
   protected $table = 'user_experiences';
   protected $fillable = ['position','company','duration','info_id'];

   public function personalInfo(){
    return $this->belongsTo(PersonalInfo::class);
   }
}

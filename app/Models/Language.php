<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'user_languages';
    protected $fillable = ['language','level','info_id'];


    public function personalInfo(){
        return $this->belongsTo(PersonalInfo::class);
    }



}

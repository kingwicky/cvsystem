<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'user_educations';
    protected $fillable = ['field','qualification','school','year','status','info_id'];

    public function personalInfo(){
        return $this->belongsTo(PersonalInfo::class);
    }

}

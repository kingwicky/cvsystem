<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = 'personal_informations';

    protected $fillable = [
        'title',
         'summary',
          'fname',
           'lname',
            'country_code',
             'mobile',
              'email',
               'address1',
                'address2',
                 'state',
                  'zip',
                   'country',
                    'dob',
                     'gender',
                      'user_id',
                      'created_at',
                       'updated_at',
                        'profile_image'
                    ];



public function languages(){
    return $this->hasMany(Language::class,'info_id');
}

public function educations(){
    return $this->hasMany(Education::class,'info_id');
}

public function experiences(){
    return $this->hasMany(Experience::class,'info_id');
}


}

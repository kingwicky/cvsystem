<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpanelUser extends Model
{
    protected $table = 'cpanel_account';
    protected $fillable = ['name','username','password','status'];
    protected $hidden = ['password'];
}

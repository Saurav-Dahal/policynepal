<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectInquiry extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile_no', 'agency_name', 'address'];
    
}

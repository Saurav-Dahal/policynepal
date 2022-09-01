<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyUpdate extends Model
{
    protected $fillable = ['data', 'posted_by'];

    public function assign_projects()
    {
	   return $this->belongsTo(AssignProject::class)->withTimestamps();

    }
}

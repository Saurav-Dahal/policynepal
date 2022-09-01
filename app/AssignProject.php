<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignProject extends Model
{
	protected $fillable = ['title'];

    public function daily_updates()
    {
        return $this->hasMany(DailyUpdate::class)->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany(User::class, 'assign_project_to_users')->withTimestamps();
    }
}

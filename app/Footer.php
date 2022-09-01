<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
	protected $fillable = ['address', 'email', 'mob_no', 'phone_no', 'facebook_url', 'gmail_url', 'linkedin_url', 'youtube_url', 'image', 'image_url'];
    
    public function footer_images()
    {
       return $this->hasMany(FooterImage::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterImage extends Model
{
	protected $fillable = ['rank', 'footer_id', 'image', 'image_url'];

    public function footer()
    {
    	return $this->belongsTo(Footer::class);
    }
}

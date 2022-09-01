<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class BaseController extends Controller
{
    public function changeFilename($file)
    {          
        $base64_str = substr($file, strpos($file, ",")+1);
        $name = time().'.' . explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
        $filename = "File-".$name;
        $image = base64_decode($base64_str);
        \File::put(public_path(). '/uploads/pdf/' . $filename, $image);
        $url = asset('uploads/pdf/'.$filename); 
        $data = [
        	     'file_name' => $filename,
                 'url' => $url
                ];

        return $data;
    }
}

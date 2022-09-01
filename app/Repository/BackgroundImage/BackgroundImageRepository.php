<?php

namespace App\Repository\BackgroundImage;

use Illuminate\Database\Eloquent\Model;
use App\Repository\BackgroundImage\BackgroundImageInterface;
use App\BackgroundImage;
use Image;

class BackgroundImageRepository implements BackgroundImageInterface
{
	private $backgroundimage;

   public function all()
   {
        $backgroundimage = BackgroundImage::all();
        return $backgroundimage;
   }

   public function store($request)
   {
      if($request->image)
         {
              $name = explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".'backgroundimage'.'.'.$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }

         $backgroundimage = new BackgroundImage;
         $backgroundimage->image = $name;
         $backgroundimage->image_url = $url;
         $backgroundimage->save();

         return $backgroundimage;
   }

   public function find($id)
   {
      $backgroundimage = BackgroundImage::findorFail($id);
      return $backgroundimage;
   }

   public function update($request, $id)
   { 
         $backgroundimage = BackgroundImage::findorFail($id);
         $img_path = public_path().'/uploads/'.$backgroundimage->image;

         if(file_exists(($img_path)))
            {
               unlink($img_path);
            }

        if($request->image)
         {
              $name = explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".'backgroundimage'.'.'.$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }
            
         $backgroundimage->image = $name;
         $backgroundimage->image_url = $url;
         $backgroundimage->save();

         return $backgroundimage;
   }
   
}


<?php

namespace App\Repository\Footer;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Footer\FooterInterface;
use App\Footer;
use App\FooterImage;
use Image;

class FooterRepository implements FooterInterface
{
	private $footer;

   public function all()
   {
        $footer = Footer::with('footer_images')->get();
        return $footer;
   }

   public function store($request)
   {
         $footer = Footer::create([
         'address' => $request->input('address'),
         'email' => $request->input('email'),
         'phone_no' => $request->input('phone_no'),
         'mob_no' => $request->input('mob_no'),
         'facebook_url' => $request->input('facebook_url'),
         'gmail_url' => $request->input('gmail_url'),
         'linkedin_url' => $request->input('linkedin_url'),
         'twitter_url' => $request->input('twitter_url'),
         'youtube_url' => $request->input('youtube_url')
         ]);

      if(count($request->image) > 0)

        foreach ($request->image as $key => $value) {
              $name = time().$key.'.' . explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
              $name = "Images-".$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
          Image::make($value)->save($path);

            FooterImage::create([
                'image' => $name,
                'image_url' => $url,
                'rank' => $request->rank[$key],
                'footer_id' => $footer->id
            ]);
        }

      return $footer;
   }

   public function find($id)
   {
      $footer = Footer::findorFail($id)->with('footer_images')->get();
      return $footer;
   }

   public function update($request, $id)
   { 
        $footer = Footer::findorFail($id);

          $footer->update([
         'address' => $request->input('address'),
         'email' => $request->input('email'),
         'phone_no' => $request->input('phone_no'),
         'mob_no' => $request->input('mob_no'),
         'facebook_url' => $request->input('facebook_url'),
         'gmail_url' => $request->input('gmail_url'),
         'linkedin_url' => $request->input('linkedin_url'),
         'twitter_url' => $request->input('twitter_url'),
         'youtube_url' => $request->input('youtube_url')

         ]);
          
      if(count($request->image)>0)
      {   
         foreach ($request->image as $key => $value) {
          $img_path = public_path().'/uploads/'.$footer->footer_images[$key]->image;
              if(file_exists(($img_path)))
                {
                 unlink($img_path);
                }

               $name = time().$key.'.' . explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
               $name = "Images-".$name;

               $path = public_path().'/uploads/'.$name;
               $url = asset('uploads/'.$name);

          Image::make($value)->save($path);

            $footer->footer_images[$key]->update([
                'image' => $name,
                'image_url' => $url,
                'rank' => $request->rank[$key],
                'footer_id' => $footer->id
            ]);
        }

      }

        return $footer;
   }

   public function delete($id)
   {
      $footer = Footer::findorFail($id);

      if(count($footer->footer_images) > 0){
          foreach ($footer->footer_images as $key => $value) {

            $img_path = public_path().'/uploads/'.$value->image;

               if(file_exists(($img_path)))
                  {
                    unlink($img_path);
                  }

            $value->delete();
          }
        }
        $footer->delete();
      return $footer;
    }
}


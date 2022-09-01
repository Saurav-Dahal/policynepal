<?php

namespace App\Repository\ProjectRunning;

use Illuminate\Database\Eloquent\Model;
use App\Repository\ProjectRunning\ProjectRunningInterface;
use App\ProjectRunning;
use Image;

class ProjectRunningRepository implements ProjectRunningInterface
{
   private $pro_run;

   public function all()
   {
   	  $pro_run = ProjectRunning::all();
   	  return $pro_run;
   }

   public function store($request)
   {
      if($request->image)
         {
              $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }

         $pro_run = new ProjectRunning;
         $pro_run->title = $request->input('title');
         $pro_run->image = $name;
         $pro_run->image_url = $url;
         $pro_run->description = $request->input('description');
         $pro_run->technology_used = $request->input('technology_used');
         $pro_run->save();

         return $pro_run;
   }

   public function find($id)
   {
      $pro_run = ProjectRunning::findorFail($id);
      return $pro_run;
   }

   public function update($request, $id)
   { 
      if($request->image)
         {
              $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }

         $pro_run = ProjectRunning::findorFail($id);

         $img_path = public_path().'/uploads/'.$pro_run->image;
 
         if(file_exists(($img_path)))
            {
               unlink($img_path);
            }

         $pro_run->title = $request->input('title');
         $pro_run->image = $name;
         $pro_run->image_url = $url;
         $pro_run->description = $request->input('description');
         $pro_run->technology_used = $request->input('technology_used');
         $pro_run->save();

         return $pro_run;
   }

   public function delete($id)
   {
         $pro_run = ProjectRunning::findorFail($id);
         $path = public_path().'/uploads/'.$pro_run->image;
         
         if(file_exists(($path)))
            {
               unlink($path);
            }

         $pro_run->delete();
         return $pro_run;
   }

}
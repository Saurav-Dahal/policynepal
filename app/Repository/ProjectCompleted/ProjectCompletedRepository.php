<?php

namespace App\Repository\ProjectCompleted;

use Illuminate\Database\Eloquent\Model;
use App\Repository\ProjectCompleted\ProjectCompletedInterface;
use App\ProjectCompleted;
use Image;

class ProjectCompletedRepository implements ProjectCompletedInterface
{
   private $pro_com;

   public function all()
   {
        $pro_com = ProjectCompleted::all();
        return $pro_com;
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

         $pro_com = new ProjectCompleted;
         $pro_com->title = $request->input('title');
         $pro_com->image = $name;
         $pro_com->image_url = $url;
         $pro_com->link = $request->input('link');
         $pro_com->description = $request->input('description');
         $pro_com->customer_review = $request->input('customer_review');
         $pro_com->technology_used = $request->input('technology_used');
         $pro_com->save();

         return $pro_com;
   }

   public function find($id)
   {
      $pro_com = ProjectCompleted::findorFail($id);
      return $pro_com;
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

         $pro_com = ProjectCompleted::findorFail($id);

         $img_path = public_path().'/uploads/'.$pro_com->image;
 
         if(file_exists(($img_path)))
            {
               unlink($img_path);
            }

         $pro_com->title = $request->input('title');
         $pro_com->image = $name;
         $pro_com->image_url = $url;
         $pro_com->link = $request->input('link');
         $pro_com->description = $request->input('description');
         $pro_com->customer_review = $request->input('customer_review');
         $pro_com->technology_used = $request->input('technology_used');
         $pro_com->save();

         return $pro_com;
   }

   public function delete($id)
   {
         $pro_com = ProjectCompleted::findorFail($id);
         $path = public_path().'/uploads/'.$pro_com->image;
         
         if(file_exists(($path)))
            {
               unlink($path);
            }

         $pro_com->delete();
         return $pro_com;
   }

}
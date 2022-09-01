<?php

namespace App\Repository\Service;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Service\ServiceInterface;
use App\Service;
use Image;

class ServiceRepository implements ServiceInterface
{
	private $service;

   public function all()
   {
        $service = Service::all();
        return $service;
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

         $service = new Service;
         $service->title = $request->input('title');
         $service->image = $name;
         $service->image_url = $url;
         $service->description = $request->input('description');
         $service->doc_link = $request->input('doc_link');
         $service->title1 = $request->input('title1');
         $service->description1 = $request->input('description1');
         $service->title2 = $request->input('title2');
         $service->description2 = $request->input('description2');
         $service->title3 = $request->input('title3');
         $service->description3 = $request->input('description3');
         $service->title4 = $request->input('title4');
         $service->description4 = $request->input('description4');
         $service->save();

         return $service;
   }

   public function find($id)
   {
      $service = Service::findorFail($id);
      return $service;
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

         $service = Service::findorFail($id);

         $img_path = public_path().'/uploads/'.$service->image;
 
         if(file_exists(($img_path)))
            {
               unlink($img_path);
            }
            
         $service->title = $request->input('title');
         $service->image = $name;
         $service->image_url = $url;
         $service->description = $request->input('description');
         $service->doc_link = $request->input('doc_link');
         $service->title1 = $request->input('title1');
         $service->description1 = $request->input('description1');
         $service->title2 = $request->input('title2');
         $service->description2 = $request->input('description2');
         $service->title3 = $request->input('title3');
         $service->description3 = $request->input('description3');
         $service->title4 = $request->input('title4');
         $service->description4 = $request->input('description4');
         $service->save();

         return $service;
   }

   public function delete($id)
   {
         $service = Service::findorFail($id);
         $path = public_path().'/uploads/'.$service->image;
         
         if(file_exists(($path)))
            {
               unlink($path);
            }

         $service->delete();
         return $service;
   }
   
}


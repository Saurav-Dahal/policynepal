<?php

namespace App\Repository\Team;

use Illuminate\Database\Eloquent\Model;
use App\Team;
use App\Repository\Team\TeamInterface;
use Image;

class TeamRepository implements TeamInterface
{
	private $team;

   public function all()
   {
        $team = Team::all();
        return $team;
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

         $team = new Team;
         $team->name = $request->input('name');
         $team->image = $name;
         $team->image_url = $url;
         $team->designation = $request->input('designation');
         $team->rank = $request->input('rank');
         $team->save();

         return $team;
   }

   public function find($id)
   {
      $team = Team::findorFail($id);
      return $team;
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

         $team = Team::findorFail($id);

         $img_path = public_path().'/uploads/'.$team->image;
 
         if(file_exists(($img_path)))
            {
               unlink($img_path);
            }
            
         $team->name = $request->input('name');
         $team->image = $name;
         $team->image_url = $url;
         $team->designation = $request->input('designation');
         $team->rank = $request->input('rank');
         $team->save();

         return $team;
   }

   public function delete($id)
   {
         $team = Team::findorFail($id);
         $path = public_path().'/uploads/'.$team->image;
         
         if(file_exists(($path)))
            {
               unlink($path);
            }

         $team->delete();
         return $team;
   }


}


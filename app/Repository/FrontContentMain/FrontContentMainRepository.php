<?php

namespace App\Repository\FrontContentMain;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FrontContentMain\FrontContentMainInterface;
use App\FrontContentMain;

class FrontContentMainRepository implements FrontContentMainInterface
{
   private $front_content_main;

   public function all()
   {
   	  $front_content_main = FrontContentMain::all();
   	  return $front_content_main;
   }

   public function store($request)
   {
      $front_content_main = new FrontContentMain;
      $front_content_main->title = $request->input('title');
      $front_content_main->description = $request->input('description');
      $front_content_main->save();

      return $front_content_main;
   }

   public function find($id)
   {
      $front_content_main = FrontContentMain::findorFail($id);
      return $front_content_main;
   }

   public function update($request, $id)
   { 
     $front_content_main = FrontContentMain::findorFail($id);
     $front_content_main->title = $request->input('title');
     $front_content_main->description = $request->input('description');
     $front_content_main->save();

     return $front_content_main;
   }

}
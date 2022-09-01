<?php

namespace App\Repository\FrontContent2;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FrontContent2\FrontContent2Interface;
use App\FrontContent2;

class FrontContent2Repository implements FrontContent2Interface
{
   private $front_content2;

   public function all()
   {
   	  $front_content2 = FrontContent2::all();
   	  return $front_content2;
   }

   public function store($request)
   {
      $front_content2 = new FrontContent2;
      $front_content2->title = $request->input('title');
      $front_content2->description = $request->input('description');
      $front_content2->save();

      return $front_content2;
   }

   public function find($id)
   {
      $front_content2 = FrontContent2::findorFail($id);
      return $front_content2;
   }

   public function update($request, $id)
   { 
     $front_content2 = FrontContent2::findorFail($id);
     $front_content2->title = $request->input('title');
     $front_content2->description = $request->input('description');
     $front_content2->save();

     return $front_content2;
   }

}
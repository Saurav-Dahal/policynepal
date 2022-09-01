<?php

namespace App\Repository\FrontContent1;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FrontContent1\FrontContent1Interface;
use App\FrontContent1;

class FrontContent1Repository implements FrontContent1Interface
{
   private $front_content1;

   public function all()
   {
   	  $front_content1 = FrontContent1::all();
   	  return $front_content1;
   }

   public function store($request)
   {
      $front_content1 = new FrontContent1;
      $front_content1->title = $request->input('title');
      $front_content1->description = $request->input('description');
      $front_content1->save();

      return $front_content1;
   }

   public function find($id)
   {
      $front_content1 = FrontContent1::findorFail($id);
      return $front_content1;
   }

   public function update($request, $id)
   { 
     $front_content1 = FrontContent1::findorFail($id);
     $front_content1->title = $request->input('title');
     $front_content1->description = $request->input('description');
     $front_content1->save();

     return $front_content1;
   }

}
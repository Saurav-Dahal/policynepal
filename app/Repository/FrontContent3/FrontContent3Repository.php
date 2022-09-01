<?php

namespace App\Repository\FrontContent3;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FrontContent3\FrontContent3Interface;
use App\FrontContent3;

class FrontContent3Repository implements FrontContent3Interface
{
   private $front_content3;

   public function all()
   {
   	  $front_content3 = FrontContent3::all();
   	  return $front_content3;
   }

   public function store($request)
   {
      $front_content3 = new FrontContent3;
      $front_content3->title = $request->input('title');
      $front_content3->description = $request->input('description');
      $front_content3->save();

      return $front_content3;
   }

   public function find($id)
   {
      $front_content3 = FrontContent3::findorFail($id);
      return $front_content3;
   }

   public function update($request, $id)
   { 
     $front_content3 = FrontContent3::findorFail($id);
     $front_content3->title = $request->input('title');
     $front_content3->description = $request->input('description');
     $front_content3->save();

     return $front_content3;
   }

}
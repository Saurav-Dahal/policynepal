<?php

namespace App\Repository\FrontService;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FrontService\FrontServiceInterface;
use App\FrontService;

class FrontServiceRepository implements FrontServiceInterface
{
   private $front_service;

   public function all()
   {
   	  $front_service = FrontService::all();
   	  return $front_service;
   }

   public function store($request)
   {
      $front_service = new FrontService;
      $front_service->title = $request->input('title');
      $front_service->description = $request->input('description');
      $front_service->save();

      return $front_service;
   }

   public function find($id)
   {
      $front_service = FrontService::findorFail($id);
      return $front_service;
   }

   public function update($request, $id)
   { 
     $front_service = FrontService::findorFail($id);
     $front_service->title = $request->input('title');
     $front_service->description = $request->input('description');
     $front_service->save();

     return $front_service;
   }

}
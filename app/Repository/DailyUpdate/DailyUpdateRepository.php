<?php

namespace App\Repository\DailyUpdate;

use Illuminate\Database\Eloquent\Model;
use App\Repository\DailyUpdate\DailyUpdateInterface;
use App\DailyUpdate;
use Image;

class DailyUpdateRepository implements DailyUpdateInterface
{
   private $daily_up;

   public function store($request)
   {
         $daily_up = new DailyUpdate;
         $daily_up->data = $request->input('data');
         $daily_up->project_id = $request->input('project_id');
         $daily_up->posted_by = Auth::user();
         $daily_up->save();

         return $daily_up;
   }

}
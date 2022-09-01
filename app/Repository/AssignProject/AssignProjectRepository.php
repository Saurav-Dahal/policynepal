<?php

namespace App\Repository\AssignProject;

use Illuminate\Database\Eloquent\Model;
use App\Repository\AssignProject\AssignProjectInterface;
use App\AssignProject;

class AssignProjectRepository implements AssignProjectInterface
{
   private $as_pro;

   public function all()
   {
        $as_pro = AssignProject::all();
        return $as_pro;
   }

   public function store($request)
   {
         $as_pro = new AssignProject;
         $as_pro->title = $request->input('title');
         $as_pro->save();

         $project_to_user = $request->input('assign_to');
         $as_pro->users()->attach($project_to_user);

         return $as_pro;
   }

   // public function find($id)
   // {
   //    $as_pro = AssignProject::findorFail($id);
   //    return $as_pro;
   // }

   public function update($request, $id)
   {
        

         $as_pro = AssignProject::findorFail($id);
         $as_pro->title = $request->input('title');
         $as_pro->save();
         
         $project_to_user = $request->input('assign_to');
         $as_pro->users()->sync($project_to_user);

         return $as_pro;
   }

   public function delete($id)
   {
         $as_pro = AssignProject::findorFail($id);
         $as_pro->delete();

         return $as_pro;
   }

}
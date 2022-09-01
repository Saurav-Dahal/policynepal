<?php

namespace App\Repository\Role;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Repository\Role\RoleInterface;

class RoleRepository implements RoleInterface
{  
   private $role;

   public function all()
   {
   	 $role = Role::all();
       return $role;
   }

   public function store($request)
   { 
   
   	   $role = new Role;
   	   $role->name = $request->input('name');
   	   $role->description = $request->input('description');
   	   $role->save();
   	   return $role;
   }
   
   public function find($id)
   {
   	   $role = Role::findorFail($id);
   	   return $role;
   }

   public function update($request, $id)
   {
       $role = Role::findorFail($id);
   	   $role->name = $request->input('name');
   	   $role->description = $request->input('description');
   	   $role->save();
   	   return $role;
   }

   public function delete($id)
   {
   	   $role = Role::findorFail($id);
   	   $role->delete();
   	   return $role;
   }
}

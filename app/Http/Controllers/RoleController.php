<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Role\RoleInterface;
use App\Role;

class RoleController extends Controller
{
   private $role;

	  public function __construct(RoleInterface $role) 
	  {
       $this->role = $role;
	  }
    
    public function index()
    {
       $allrole = $this->role->all();
       return response()->json(['role' => $allrole], 200);
    }

    public function store(Request $request)
    {  
       $this->validate($request, [
            'name' => 'required'
       ]);

       $this->role->store($request);
       return response()->json(['message' => 'Role created successfully.'], 201);

    }

    public function edit($id)
    {  
       $role = $this->role->find($id);
      return response()->json(['role' => $role], 200);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
            'name' => 'required'
       ]);

       $role = $this->role->update($request, $id);
       return response()->json(['message' => 'Role updated successfully.'], 201);
    }

    public function delete($id)
    {
      $role = $this->role->delete($id);

      if($role){
        return response()->json(['message' => 'Role deleted successfully.'], 201);
      }else {
        return response()->json(['message' => 'Some problem occured while deleting role.'], 500);
      }   
      
    }

}

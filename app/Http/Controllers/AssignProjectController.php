<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\AssignProject\AssignProjectInterface;
use Illuminate\Validation\Validator;
use App\AssignProject;
use Image;

class AssignProjectController extends Controller
{
    private $as_pro;

	  public function __construct(AssignProjectInterface $as_pro) 
	  {
       $this->as_pro = $as_pro;
	  }
      
      public function index()
      {
      	$as_pro = $this->as_pro->all();
      	return response()->json(['as_pro' => $as_pro], 200);
      }

      public function store(Request $request)
      {
        $this->validate($request, [
          'title' => 'required',
          'assign_to' => 'required'
        ]);

        $this->as_pro->store($request);
      	return response()->json(['message' => 'Project created and assigned successfully.'], 201);
      }

      public function edit($id)
      {
      	$as_pro = $this->as_pro->find($id);
      	return response()->json(['as_pro' => $as_pro], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'assign_to' => 'required'
        ]);

        $this->as_pro->update($request, $id);
        return response()->json(['message' => 'Project updated and assigned successfully.'], 201);
      }

      public function delete($id)
      {
        $this->as_pro->delete($id);
        return response()->json(['message' => 'Project deleted successfully.'], 201);
      }


}


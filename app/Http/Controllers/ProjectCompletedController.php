<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProjectCompleted\ProjectCompletedInterface;
use Illuminate\Validation\Validator;
use App\ProjectCompleted;
use Image;

class ProjectCompletedController extends Controller
{
    private $pro_com;

	  public function __construct(ProjectCompletedInterface $pro_com) 
	  {
       $this->pro_com = $pro_com;
	  }
      
      public function index()
      {
      	$pro_com = $this->pro_com->all();
      	return response()->json(['pro_com' => $pro_com], 200);
      }

      public function store(Request $request)
      {
        $this->validate($request, [
          'title' => 'required',
          // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
          'technology_used' => 'required'
        ]);

        $this->pro_com->store($request);
      	return response()->json(['message' => 'Completed project details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$pro_com = $this->pro_com->find($id);
      	return response()->json(['pro_com' => $pro_com], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
           'technology_used' => 'required'
        ]);

        $this->pro_com->update($request, $id);
        return response()->json(['message' => 'Completed project details updated successfully.'], 201);
      }

      public function delete($id)
      {
        $this->pro_com->delete($id);
        return response()->json(['message' => 'Completed project details deleted successfully.'], 201);
      }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProjectRunning\ProjectRunningInterface;
use Illuminate\Validation\Validator;
use App\ProjectRunning;
use Image;

class ProjectRunningController extends Controller
{
   private $pro_run;

	  public function __construct(ProjectRunningInterface $pro_run) 
	  {
       $this->pro_run = $pro_run;
	  }
      
      public function index()
      {
      	$pro_run = $this->pro_run->all();
      	return response()->json(['pro_run' => $pro_run], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
           'image' => 'required',
           'technology_used' => 'required'
      	]);

      	$this->pro_run->store($request);
      	return response()->json(['message' => 'Running project details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$pro_run = $this->pro_run->find($id);
      	return response()->json(['pro_run' => $pro_run], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
           'technology_used' => 'required'
        ]);

        $this->pro_run->update($request, $id);
        return response()->json(['message' => 'Running project details updated successfully.'], 201);
      }

      public function delete($id)
      {
        $this->pro_run->delete($id);
        return response()->json(['message' => 'Running project details deleted successfully.'], 201);
      }

}

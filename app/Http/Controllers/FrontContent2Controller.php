<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontContent2\FrontContent2Interface;
use Illuminate\Validation\Validator;
use App\FrontContent2;

class FrontContent2Controller extends Controller
{
     private $front_content2;

	  public function __construct(FrontContent2Interface $front_content2) 
	  {
       $this->front_content2 = $front_content2;
	  }
      
      public function index()
      {
      	$front_content2 = $this->front_content2->all();
      	return response()->json(['front_content2' => $front_content2], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           'description' => 'required'
      	]);

      	$this->front_content2->store($request);
      	return response()->json(['message' => 'Front Content2 details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$front_content2 = $this->front_content2->find($id);
      	return response()->json(['front_content2' => $front_content2], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required'
        ]);

        $this->front_content2->update($request, $id);
        return response()->json(['message' => 'Front Content2 details updated successfully.'], 201);
      }

}


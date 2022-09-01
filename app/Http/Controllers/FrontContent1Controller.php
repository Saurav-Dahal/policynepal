<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontContent1\FrontContent1Interface;
use App\FrontContent1;

class FrontContent1Controller extends Controller
{
     private $front_content1;

	  public function __construct(FrontContent1Interface $front_content1) 
	  {
       $this->front_content1 = $front_content1;
	  }
      
      public function index()
      {
      	$front_content1 = $this->front_content1->all();
      	return response()->json(['front_content1' => $front_content1], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           'description' => 'required'
      	]);

      	$this->front_content1->store($request);
      	return response()->json(['message' => 'Front Content1 details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$front_content1 = $this->front_content1->find($id);
      	return response()->json(['front_content1' => $front_content1], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required'
        ]);

        $this->front_content1->update($request, $id);
        return response()->json(['message' => 'Front Content1 details updated successfully.'], 201);
      }

}

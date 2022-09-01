<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontContent3\FrontContent3Interface;
use Illuminate\Validation\Validator;
use App\FrontContent3;

class FrontContent3Controller extends Controller
{
     private $front_content3;

	  public function __construct(FrontContent3Interface $front_content3) 
	  {
       $this->front_content3 = $front_content3;
	  }
      
      public function index()
      {
      	$front_content3 = $this->front_content3->all();
      	return response()->json(['front_content3' => $front_content3], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           'description' => 'required'
      	]);

      	$this->front_content3->store($request);
      	return response()->json(['message' => 'Front Content3 details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$front_content3 = $this->front_content3->find($id);
      	return response()->json(['front_content3' => $front_content3], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required'
        ]);

        $this->front_content3->update($request, $id);
        return response()->json(['message' => 'Front Content3 details updated successfully.'], 201);
      }

}


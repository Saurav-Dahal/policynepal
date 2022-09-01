<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontService\FrontServiceInterface;
use Illuminate\Validation\Validator;
use App\FrontService;

class FrontServiceController extends Controller
{
     private $front_service;

	  public function __construct(FrontServiceInterface $front_service) 
	  {
       $this->front_service = $front_service;
	  }
      
      public function index()
      {
      	$front_service = $this->front_service->all();
      	return response()->json(['front_service' => $front_service], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           'description' => 'required'
      	]);

      	$this->front_service->store($request);
      	return response()->json(['message' => 'Front Service details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$front_service = $this->front_service->find($id);
      	return response()->json(['front_service' => $front_service], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required'
        ]);

        $this->front_service->update($request, $id);
        return response()->json(['message' => 'Front Service details updated successfully.'], 201);
      }

}

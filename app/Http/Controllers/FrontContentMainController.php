<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontContentMain\FrontContentMainInterface;
use Illuminate\Validation\Validator;
use App\FrontContentMain;

class FrontContentMainController extends Controller
{
     private $front_content_main;

	  public function __construct(FrontContentMainInterface $front_content_main) 
	  {
       $this->front_content_main = $front_content_main;
	  }
      
      public function index()
      {
      	$front_content_main = $this->front_content_main->all();
      	return response()->json(['front_content_main' => $front_content_main], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'title' => 'required',
           'description' => 'required'
      	]);

      	$this->front_content_main->store($request);
      	return response()->json(['message' => 'Front Content Main details created successfully.'], 201);
      }

      public function edit($id)
      {
      	$front_content_main = $this->front_content_main->find($id);
      	return response()->json(['front_content_main' => $front_content_main], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required'
        ]);

        $this->front_content_main->update($request, $id);
        return response()->json(['message' => 'Front Content Main details updated successfully.'], 201);
      }

}


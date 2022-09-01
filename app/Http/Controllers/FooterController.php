<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Footer\FooterInterface;
use App\Footer;
use Image;

class FooterController extends Controller
{
	  private $footer;

	  public function __construct(FooterInterface $footer) 
	  {
       $this->footer = $footer;
	  }
      
      public function index()
      {
      	$footer = $this->footer->all();
      	return response()->json(['footer' => $footer], 200);
      }

      public function store(Request $request)
      {
        $this->validate($request, [
          'address' => 'required',
          'email' => 'required',
          'mob_no' => 'required',
          'image[]' => 'required'          
        ]);

        $this->footer->store($request);
      	return response()->json(['message' => 'Footer created successfully.'], 201);
      }

      public function edit($id)
      {
      	$footer = $this->footer->find($id);
      	return response()->json(['footer' => $footer], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
          'address' => 'required',
          'email' => 'required',
          'mob_no' => 'required',
          // 'image' => 'required'          
        ]);

        $this->footer->update($request, $id);
        return response()->json(['message' => 'Footer updated successfully.'], 201);
      }

      public function delete($id)
      {
        $this->footer->delete($id);
        return response()->json(['message' => 'Footer deleted successfully.'], 201);
      }
   
}

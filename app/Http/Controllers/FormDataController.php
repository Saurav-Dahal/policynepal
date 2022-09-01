<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FormData\FormDataInterface;
use App\FormData;
use Image;

class FormDataController extends Controller
{
    private $form_data;

	  public function __construct(FormDataInterface $form_data) 
	  {
        $this->form_data = $form_data;
	  }
      
      public function index()
      {
      	$form_data = $this->form_data->all();
      	return response()->json(['form_data' => $form_data], 200);
      }

      public function store(Request $request)
      {
        $this->validate($request, [
          'first_name' => 'required',
          'email' => 'required',
          'phone_no' => 'required',
          'address' => 'required',
          'college' => 'required',
          'fos' => 'required',
          'degree' => 'required',
          'degree_from' => 'required',
          // 'resume' => 'required|mimes:pdf|max:5000',
          // 'cov_letter' => 'mimes:pdf|max:5000'
        ]);

         $this->form_data->store($request);
         return response()->json(['message' => 'User form data stored successfully.'], 201);
      }

       public function delete($id)
      {
        $this->form_data->delete($id);
      	return response()->json(['message' => 'User form data deleted successfully.'], 201);
      }
}

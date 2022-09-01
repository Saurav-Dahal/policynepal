<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProjectInquiry\ProjectInquiryInterface;
use App\ProjectInquiry;

class ProjectInquiryController extends Controller
{
    private $pro_in;

	  public function __construct(ProjectInquiryInterface $pro_in) 
	  {
       $this->pro_in = $pro_in;   
	  }

    public function index()
    {
      $pro_in = $this->pro_in->all();
      return response()->json(['pro_in' => $pro_in], 200);
    }
    
    public function store(Request $request)
    {
      	$this->validate($request, [
         'first_name' => 'required | max:255',
         'last_name' =>  'required|max:255',
         'email' => 'required|email',
         'agency_name' => 'required|max:255',
         'mobile_no' => 'required|max:16',
         'address' => 'required|max:255',
      	]);

        $pro_in = $this->pro_in->store($request);
        return response()->json(['message' => 'Inquiry send successfully.'], 201);

    }

    public function delete($id)
    {
      $this->pro_in->delete($id);
      return response()->json([['message' => 'Inquiry deleted successfully.']], 201);
    }

}

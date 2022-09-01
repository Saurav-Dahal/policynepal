<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Quotation\QuotationInterface;
use Illuminate\Validation\Validator;
use App\Quotation;

class QuotationController extends Controller
{
     private $quotation;

	  public function __construct(QuotationInterface $quotation) 
	  {
       $this->quotation = $quotation;
	  }
      
      public function index()
      {
      	$quotation = $this->quotation->all();
      	return response()->json(['quotation' => $quotation], 200);
      }

      public function store(Request $request)
      {
      	$this->validate($request, [
           'quotation' => 'required'
      	]);

      	$this->quotation->store($request);
      	return response()->json(['message' => 'Quotation created successfully.'], 201);
      }

      public function edit($id)
      {
      	$quotation = $this->quotation->find($id);
      	return response()->json(['quotation' => $quotation], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
           'quotation' => 'required',
           
        ]);

        $this->quotation->update($request, $id);
        return response()->json(['message' => 'Quotaion updated successfully.'], 201);
      }
}

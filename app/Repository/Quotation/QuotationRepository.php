<?php

namespace App\Repository\Quotation;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Quotation\QuotationInterface;
use App\Quotation;

class QuotationRepository implements QuotationInterface
{
   private $quotation;

   public function all()
   {
   	  $quotation = Quotation::all();
   	  return $quotation;
   }

   public function store($request)
   {  
      $quotation = new Quotation;
      $quotation->quotation = $request->input('quotation');
      $quotation->save();

      return $quotation;
   }

   public function find($id)
   {
      $quotation = Quotation::findorFail($id);
      return $quotation;
   }

   public function update($request, $id)
   { 
     $quotation = Quotation::findorFail($id);
     $quotation->quotation = $request->input('quotation');
     $quotation->save();

     return $quotation;
   }

}
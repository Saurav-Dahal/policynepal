<?php

namespace App\Repository\ProjectInquiry;

use Illuminate\Database\Eloquent\Model;
use App\Repository\ProjectInquiry\ProjectInquiryInterface;
use App\ProjectInquiry;
use app\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class ProjectInquiryRepository implements ProjectInquiryInterface
{
   private $pro_in;

   public function all()
   {
      $pro_in = ProjectInquiry::all();
      return $pro_in;
   }

   public function store($request)
   {

       $pro_in = new ProjectInquiry;
       $pro_in->first_name = $request->input('first_name');
       $pro_in->last_name = $request->input('last_name');
       $pro_in->email = $request->input('email');
       $pro_in->agency_name = $request->input('agency_name');
       $pro_in->mobile_no = $request->input('mobile_no');
       $pro_in->address = $request->input('address');

       $pro_in->save();
    
       $data = array('first_name' => $request->first_name,
                     'last_name' => $request->last_name,
                     'email' => $request->email,
                     'agency_name' => $request->agency_name,
                     'mobile_no' => $request->mobile_no,
                     'address' => $request->address
                    );

      Mail::send('email.welcome', $data, function($message) use ($data){
      $message->from('saurav.segonatech@gmail.com');
      $message->to($data['email'])->subject('New registeration has been done in policynepal.');});

   	   return $pro_in;
   }

   public function delete($id)
   {
     $pro_in = ProjectInquiry::findorFail($id);
     $pro_in->delete();
     return $pro_in; 
   }

}
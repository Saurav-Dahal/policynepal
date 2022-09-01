<?php

namespace App\Repository\FormData;

use Illuminate\Database\Eloquent\Model;
use App\Repository\FormData\FormDataInterface;
use App\FormData;
use App\Http\Controllers\BaseController;

class FormDataRepository extends BaseController implements FormDataInterface 
{
   private $form_data;

   public function all()
   {
        $form_data = FormData::all();;
        return $form_data;
   }

   public function store($request)
   {     
     // return $request->resume;
      if($request->resume)
        {   
           // $resume = new BaseController;
           // $resume = BaseController::changeFilename($request->resume);
           // $aa = $resume->changeFilename($request->resume);
          $resume = $this->changeFilename($request->resume);
          // $resume = parent::changeFilename($request->resume); 
        }else{
           $resume['file_name'] = 'null';
           $resume['url'] = 'null';
        }
        
      if($request->cov_letter)
        {
           $cov_letter =  $this->changeFilename($request->cov_letter);
           // return $cov_letter;
           // new BaseController;
           // $bb = $cov_letter->changeFilename($request->cov_letter); 
        } else{
            $cov_letter['file_name'] = 'null';
            $cov_letter['url'] = 'null';

        }  

         $form_data = new FormData;
         $form_data->first_name = $request->input('first_name');
         $form_data->last_name = $request->input('last_name');
         $form_data->email = $request->input('email');
         $form_data->phone_no = $request->input('phone_no');
         $form_data->address = $request->input('address');
         $form_data->college = $request->input('college');
         $form_data->fos = $request->input('fos');
         $form_data->degree = $request->input('degree');
         $form_data->degree_from = $request->input('degree_from');
         $form_data->degree_to = $request->input('degree_to');
         $form_data->last_comp_name = $request->input('last_comp_name');
         $form_data->designation = $request->input('designation');
         $form_data->experience_from = $request->input('experience_from');
         $form_data->experience_to = $request->input('experience_to');
         $form_data->resume = $resume['file_name'];
         $form_data->resume_url = $resume['url'];
         $form_data->cov_letter = $cov_letter['file_name'];
         $form_data->cov_letter_url = $cov_letter['url'];
         $form_data->save();

         return $form_data;
   }

   public function delete($id)
   {
        $form_data = FormData::findorFail($id);
        $path1 = public_path().'/uploads/others/'.$form_data->resume;
        $path2 = public_path().'/uploads/others/'.$form_data->cov_letter; 

        if(file_exists(($path1)))
          {
              unlink($path1);
          }

          if(file_exists(($path2)))
          {
              unlink($path2);
          }

        $form_data->delete();
        return $form_data;
   }

}
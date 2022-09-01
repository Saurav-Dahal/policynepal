<?php

namespace App\Repository\Vacancy;

use Illuminate\Database\Eloquent\Model;
use App\Repository\Vacancy\VacancyInterface;
use App\Vacancy;
use Image;

class VacancyRepository implements VacancyInterface
{
   private $vacancy;

   public function all()
   {
        $vacancy = Vacancy::all();
        return $vacancy;
   }

   public function store($request)
   {
      if($request->image)
         {
              $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }else{
          $name = '';
          $url = '';
         }

         $vacancy = new Vacancy;
         $vacancy->title = $request->input('title');
         $vacancy->image = $name;
         $vacancy->image_url = $url;
         $vacancy->end_date = $request->input('end_date');
         $vacancy->job_category = $request->input('job_category');
         $vacancy->job_level = $request->input('job_level');
         $vacancy->no_of_vacancy = $request->input('no_of_vacancy');
         $vacancy->employment_type = $request->input('employment_type');
         $vacancy->salary = $request->input('salary');
         $vacancy->education_level = $request->input('education_level');
         $vacancy->experience = $request->input('experience');
         $vacancy->job_description = $request->input('job_description');
         $vacancy->save();

         return $vacancy;
   }

   public function find($id)
   {
      $vacancy = Vacancy::findorFail($id);
      return $vacancy;
   }

   public function update($request, $id)
   { 
      if($request->image)
         {
              $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
              $name = "Images-".$name;

              $path = public_path().'/uploads/'.$name;
              $url = asset('uploads/'.$name);
              
              Image::make($request->image)->save($path);
         }
         else{
          $name = '';
          $url = '';
         }

         $vacancy = Vacancy::findorFail($id);

         
         $img_path = public_path('uploads'.DIRECTORY_SEPARATOR.$vacancy->image);
        

         if($vacancy->image != null)
            {

               unlink($img_path);
            }
               $vacancy->title = $request->input('title');
               $vacancy->image = $name;
               $vacancy->image_url = $url;
               $vacancy->end_date = $request->input('end_date');
               $vacancy->job_category = $request->input('job_category');
               $vacancy->job_level = $request->input('job_level');
               $vacancy->no_of_vacancy = $request->input('no_of_vacancy');
               $vacancy->employment_type = $request->input('employment_type');
               $vacancy->salary = $request->input('salary');
               $vacancy->education_level = $request->input('education_level');
               $vacancy->experience = $request->input('experience');
               $vacancy->job_description = $request->input('job_description');
               $vacancy->save(); 


         return $vacancy;
   }

   public function delete($id)
   {
         $vacancy = Vacancy::findorFail($id);
         $path = public_path().'/uploads/'.$vacancy->image;
         
         if(file_exists(($path)))
            {
               unlink($path);
            }

         $vacancy->delete();
         return $vacancy;
   }

}
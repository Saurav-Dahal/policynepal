<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Vacancy\VacancyInterface;
use App\Vacancy;
use Image;

class VacancyController extends Controller
{
    private $vacancy;

	  public function __construct(VacancyInterface $vacancy) 
	  {
       $this->vacancy = $vacancy;
	  }
      
      public function index()
      {
      	$vacancy = $this->vacancy->all();
      	return response()->json(['vacancy' => $vacancy], 200);
      }

      public function store(Request $request)
      {
        $this->validate($request, [
          'title' => 'required',
          // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
          'end_date' => 'required',
          'job_category' => 'required',
          'job_level' => 'required',
          'no_of_vacancy' => 'required',
          'employment_type' => 'required',
          'salary' => 'required',
          'education_level' => 'required',
          'experience' => 'required',
          // 'image' => 'required',
          'job_description' => 'required'
        ]);

        $this->vacancy->store($request);
      	return response()->json(['message' => 'Vacancy created successfully.'], 201);
      }

      public function edit($id)
      {
      	$vacancy = $this->vacancy->find($id);
      	return response()->json(['vacancy' => $vacancy], 200);
      }

      public function update(Request $request, $id)
      {
        $this->validate($request, [
          'title' => 'required',
          // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
          'end_date' => 'required',
          'job_category' => 'required',
          'job_level' => 'required',
          'no_of_vacancy' => 'required',
          'employment_type' => 'required',
          'salary' => 'required',
          'education_level' => 'required',
          'experience' => 'required',
          'image' => 'required',
          'job_description' => 'required'
        ]);

        $this->vacancy->update($request, $id);
        return response()->json(['message' => 'Vacancy updated successfully.'], 201);
      }

      public function delete($id)
      {
        $this->vacancy->delete($id);
        return response()->json(['message' => 'Vacancy deleted successfully.'], 201);
      }
}

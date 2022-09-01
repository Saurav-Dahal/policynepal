<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\DailyUpdate\DailyUpdateInterface;
use Illuminate\Validation\Validator;
use App\DailyUpdate;
use Image;

class DailyUpdateController extends Controller
{
    private $daily_up;

	  public function __construct(DailyUpdateInterface $daily_up) 
	  {
       $this->daily_up = $daily_up;
	  }

      public function store(Request $request)
      {
        $this->validate($request, [
          'data' => 'required',
          'project_id' => 'required'
        ]);

        $this->daily_up->store($request);
      	return response()->json(['message' => 'Task posted successfully.'], 201);
      }
}

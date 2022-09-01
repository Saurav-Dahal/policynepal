<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BackgroundImage\BackgroundImageInterface;
use App\BackgroundImage;

class BackgroundImageController extends Controller
{
    private $backgroundimage;

    public function __construct(BackgroundImageInterface $backgroundimage)
    {
    	$this->backgroundimage = $backgroundimage;
    }

    public function index()
	{
		$backgroundimage = $this->backgroundimage->all();
		return response()->json(['backgroundimage' => $backgroundimage], 200);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'image' => 'required'
       ]);

		$this->backgroundimage->store($request);
		return response()->json(['message' => 'BackgroundImage created successfully.'], 201);
	}

	public function edit($id)
	{
		$backgroundimage = $this->backgroundimage->find($id);
		return response()->json(['backgroundimage' => $backgroundimage], 200);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'image' => 'required'
       ]);

		$this->backgroundimage->update($request, $id);
		return response()->json(['message' => 'BackgroundImage updated successfully.'], 201);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Service\ServiceInterface;
use App\Service;
use Image;

class ServiceController extends Controller
{
    private $service;

    public function __construct(ServiceInterface $service)
    {
    	$this->service = $service;
    }

    public function index()
	{
		$service = $this->service->all();
		return response()->json(['service' => $service], 200);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'doc_link' => 'required',
            'title1' => 'required',
            'description1' => 'required',
            'title2' => 'required',
            'description2' => 'required',
            'title3' => 'required',
            'description3' => 'required',
            'title4' => 'required',
            'description4' => 'required'
       ]);

		$this->service->store($request);
		return response()->json(['message' => 'Service created successfully.'], 201);
	}

	public function edit($id)
	{
		$service = $this->service->find($id);
		return response()->json(['service' => $service], 200);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'doc_link' => 'required',
            'title1' => 'required',
            'description1' => 'required',
            'title2' => 'required',
            'description2' => 'required',
            'title3' => 'required',
            'description3' => 'required',
            'title4' => 'required',
            'description4' => 'required'
       ]);

		$this->service->update($request, $id);
		return response()->json(['message' => 'Service updated successfully.'], 201);
	}

	public function delete($id)
	{
		$this->service->delete($id);
		return response()->json(['message' => 'Service deleted successfully.'], 201);
	}
}

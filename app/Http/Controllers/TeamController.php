<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Team\TeamInterface;
use App\Team;

class TeamController extends Controller
{
    private $team;

	public function __construct(TeamInterface $team) 
	{
       $this->team = $team;
	}

	public function index()
	{
		$team = $this->team->all();
		return response()->json(['team' => $team], 200);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'designation' => 'required',
            'rank' => 'required'
       ]);

		$this->team->store($request);
		return response()->json(['message' => 'Team created successfully.'], 201);
	}

	public function edit($id)
	{
		$team = $this->team->find($id);
		return response()->json(['team' => $team], 200);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'designation' => 'required',
            'rank' => 'required'
       ]);

		$this->team->update($request, $id);
		return response()->json(['message' => 'Team updated successfully.'], 201);
	}

	public function delete($id)
	{
		$this->team->delete($id);
		return response()->json(['message' => 'Team deleted successfully.'], 201);
	}
}

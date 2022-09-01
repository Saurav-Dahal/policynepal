<?php

namespace App\Repository\BackgroundImage;

interface BackgroundImageInterface
{
	public function all();
	public function store($request);
	public function find($id);
	public function update($request, $id);
}
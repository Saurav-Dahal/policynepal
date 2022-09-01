<?php

namespace App\Repository\FrontContent2;

interface FrontContent2Interface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
<?php

namespace App\Repository\FrontContent1;

interface FrontContent1Interface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
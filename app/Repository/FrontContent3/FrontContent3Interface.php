<?php

namespace App\Repository\FrontContent3;

interface FrontContent3Interface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
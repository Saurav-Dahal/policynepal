<?php

namespace App\Repository\FrontContentMain;

interface FrontContentMainInterface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
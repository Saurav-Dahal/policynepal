<?php

namespace App\Repository\FrontService;

interface FrontServiceInterface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
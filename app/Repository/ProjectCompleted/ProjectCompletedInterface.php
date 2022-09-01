<?php

namespace App\Repository\ProjectCompleted;

interface ProjectCompletedInterface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
  public function delete($id);
}
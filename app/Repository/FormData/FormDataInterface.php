<?php 

namespace App\Repository\FormData;

interface FormDataInterface
{
  public function all();
  public function store($request);
  public function delete($id);
}
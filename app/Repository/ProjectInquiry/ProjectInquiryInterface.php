<?php

namespace App\Repository\ProjectInquiry;

interface ProjectInquiryInterface
{
  public function all();	
  public function store($data);
  public function delete($id);
}

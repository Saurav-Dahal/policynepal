<?php

namespace App\Repository\Quotation;

interface QuotationInterface
{
  public function all();
  public function store($request);
  public function find($id);
  public function update($request, $id);
}
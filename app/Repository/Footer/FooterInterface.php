<?php

namespace App\Repository\Footer;

interface FooterInterface
{
	public function all();
	public function store($request);
	public function find($id);
	public function update($request, $id);
	public function delete($id);
}
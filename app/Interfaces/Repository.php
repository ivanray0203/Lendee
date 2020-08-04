<?php

namespace App\Interfaces;

interface Repository

{
    public function index($data);

    public function all();

    public function show($id);
    
    public function store(array $data);

    public function update(array $data, $id);

    public function destroy($id);
}
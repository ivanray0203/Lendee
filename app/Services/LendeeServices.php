<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Resources\LendeeResource;
use App\Http\Resources\LendeeCollection;


class LendeeServices
{
    public function index(array $data)
    {
        try {
            $lendee = resolve('Lendee')->index($data);
            if (Arr::exists($data, 'page')) {
                $lendee = $lendee->paginate($data['limit']);
            } else {
                $lendee = $lendee->all();
            }
            return new LendeeCollection($lendee);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $lendee = resolve('Lendee')->store($data);
            DB::commit();
            return $lendee;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function show($id)
    {
        try {
            $lendee = resolve('Lendee')->show($id);
            return LendeeResource::make($lendee);
        } catch (\Exception $exception) {
            throw $exception;
        }   
    }

    public function update(array $data, $id)
    {
        try {
            DB::beginTransaction();
            $lendee = resolve('Lendee')->update($data, $id);
            DB::commit();
            return $product;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }  
    }

    public function destroy($id)
    {
        try {
            $lendee = resolve('Lendee')->destroy($id);
            return $lendee;
        } catch (\Exception $exception) {
            throw $exception;
        } 
    }
}
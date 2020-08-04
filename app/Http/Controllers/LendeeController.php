<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Lendee\Index;
use App\Http\Requests\Lendee\Store;
use App\Http\Requests\Lendee\Update;
use App\Http\Resources\LendeeCollection;
use App\Lendee;

class LendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return resolve('LendeeServices')->index($request->all());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        try {
            $data = collect($request->validated())
            ->toArray();
            return resolve('LendeeServices')->store($data);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return resolve('LendeeServices')->show($id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request)
    {
        try {
            $data = collect($request->validated())
            ->except(['id'])
            ->toArray();
            return resolve('LendeeServices')->update($data, $request->id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return resolve('LendeeServices')->destroy($id);
        } catch (\Exception $exception) {
            throw $exception;
        } 
    }
}

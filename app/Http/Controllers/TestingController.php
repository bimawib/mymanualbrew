<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use App\Http\Requests\StoreTestingRequest;
use App\Http\Requests\UpdateTestingRequest;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTestingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function show(Testing $testing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function edit(Testing $testing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestingRequest  $request
     * @param  \App\Models\Testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestingRequest $request, Testing $testing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testing $testing)
    {
        //
    }
}

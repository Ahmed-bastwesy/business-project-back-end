<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePillRequest;
use App\Http\Requests\UpdatePillRequest;
use App\Models\Pill;

class PillController extends Controller
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
     * @param  \App\Http\Requests\StorePillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePillRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pill  $pill
     * @return \Illuminate\Http\Response
     */
    public function show(Pill $pill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pill  $pill
     * @return \Illuminate\Http\Response
     */
    public function edit(Pill $pill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePillRequest  $request
     * @param  \App\Models\Pill  $pill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePillRequest $request, Pill $pill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pill  $pill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pill $pill)
    {
        //
    }
}

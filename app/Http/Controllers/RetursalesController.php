<?php

namespace App\Http\Controllers;

use App\Retur_Sale;
use Illuminate\Http\Request;

class RetursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.retur.penjualan.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retur_Sale  $retur_Sale
     * @return \Illuminate\Http\Response
     */
    public function show(Retur_Sale $retur_Sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retur_Sale  $retur_Sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Retur_Sale $retur_Sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retur_Sale  $retur_Sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retur_Sale $retur_Sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retur_Sale  $retur_Sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retur_Sale $retur_Sale)
    {
        //
    }
}

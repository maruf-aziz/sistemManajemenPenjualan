<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Product;
use App\Unit;
use App\Brand;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.purchases.add');
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
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function getProduct(){
        $data = Product::all();
        echo "<option selected value=''>-- Pilih Produk --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id_product."' nama='".$value->name_product."'>".$value->name_product."</option>";
        }
    }

    public function getSatuan(){
        $data = Unit::all();
        echo "<option selected value=''>-- Satuan --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id_unit."'>".$value->unit."</option>";
        }
        echo "<option value='new'>Tambah Satuan</option>";
    }

    public function getMerek(){
        $data = Brand::all();
        echo "<option selected value=''>-- Merek --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id_brands."'>".$value->name."</option>";
        }
        echo "<option value='new'>Tambah Satuan</option>";
    }

    public function addNewProduct(Request $request){
        #code with response json
    }

    public function addNewUnit(Request $request){
        #code with response json
        $data = array(
            'unit' => $request->name
        );

        $lastid = Unit::create($data)->id_unit;

        return response()->json(['id_unit'=>$lastid]);
    }

    public function addNewBrand(Request $request){
        #code with response json
    }
}

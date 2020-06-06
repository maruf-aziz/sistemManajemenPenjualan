<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Unit;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::join('brands','products.brand_id', '=','brands.id_brands')
            ->join('units', 'products.unit_id','=','units.id_unit')
            ->orderby('name_product', 'asc')
            ->get();
        //
        $data = array(
            'brands' => Brand::orderby('name','asc')->get(),
            'units' => Unit::orderby('unit', 'asc')->get(),
            'products' => $product
            
        );
        return view('pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array(
            'brands' => Brand::orderby('name','asc')->get(),
            'units' => Unit::orderby('unit', 'asc')->get(),
        );
        return view('pages.products.add', $data);
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
        if(count($request->name_product) > 0){
            foreach ($request->name_product as $item=> $val) {
                # code...
                $data = array(
                    'name_product' => $request->name_product[$item],
                    'price' => $request->price[$item],
                    'unit_id' => $request->unit_id[$item],
                    'stock' => $request->stock[$item],
                    'brand_id' => $request->brand_id[$item],
                );
                Product::create($data);
            }
           
        }

        return redirect('/products')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $data = array(
            'brands' => Brand::orderby('name','asc')->get(),
            'units' => Unit::orderby('unit', 'asc')->get(),
        );
        return view('pages.products.show', $data, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

        $harga = $request->price;
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga_int = (int) $harga_str;

        Product::where('id_product', $product->id_product)
                ->update([
                    'name_product' => $request->name_product,
                    'brand_id' => $request->brand_id,
                    'price' =>  $harga_int,
                    'unit_id' => $request->unit_id,
                    'stock' => ($product->stock + $request->stock)
                ]);

        return redirect('/products')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        Product::destroy($product->id_product);
        return redirect('/products')->with('status', 'Data berhasil dihapus');
    }
}

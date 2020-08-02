<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Detail_Purchase;
use App\Product;
use App\Unit;
use App\Brand;
use App\Supplier;
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
        $data = array(
            'purchases' => Purchase::select('purchases.id' , 'purchases.total_cost', 'purchases.created_at', 'suppliers.name')
                                        ->join('suppliers','purchases.supplier_id','=','suppliers.id')
                                        ->orderby('purchases.created_at', 'DESC')
                                        ->get()
        );
        return view('pages.purchases.index', $data);
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
            'new_id'    => Purchase::latest()->value('id'),
            'satuan'    => Unit::all()
        );
        return view('pages.purchases.add', $data);
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
        $total = $request->total_cost;
        $total_str = preg_replace("/[^0-9]/", "", $total);
        $total_int = (int) $total_str;

        $data_purchase = array(
            'total_cost'    => $total_int,
            'supplier_id'   => $request->supplier_id,
            'date' => date('Y-m-d')
        );

        $lastid = Purchase::create($data_purchase)->id;

        // if(count($request->name_product) > 0){
        //     foreach ($request->name_product as $item => $value) {
        //         # code insert product

        //         $data_product = array(
        //             'name_product'  => $request->name_product[$item],
        //             'price'         => $request->price_per[$item],
        //             'unit_id'       => $request->unit_id[$item],
        //             'stock'         => $request->amount[$item],
		// 						);
								
		// 						$id_product = Product::create($data_product)->id_product;

		// 						# code insert detail purchase

		// 						$data_detail = array(
		// 							'product'					=> $id_product,
		// 							'amount'					=> $request->amount[$item],
		// 							'unit_id'					=> $request->unit_id[$item],
		// 							'price_per_seed'	=> $request->price_per[$item],
		// 							'total_price'			=> $request->price_per[$item] * $request->amount[$item],
		// 							'purchase_id' 		=> $lastid,
		// 						);

		// 						Detail_Purchase::create($data_detail);
        //     }
        // }

        if(count($request->name_product) > 0){
            foreach ($request->name_product as $item=> $val) {
                # code...
                $data2 = array(
                    'product' => $request->product[$item],
                    'amount' => $request->amount[$item],
                    'unit' => $request->unit[$item],
                    'value' => $request->value[$item],
                    'price_per_seed' => $request->price_per[$item],
                    'total_price' => $request->total_price[$item],
                    'purchase_id' => $lastid
                );

                Detail_Purchase::create($data2);

                $produk = Product::where('id_product', $request->product[$item])->first();

                $stock = $produk->stock;

                Product::where('id_product', $request->product[$item])
                        ->update([
                            'stock' => ($stock + $request->value[$item]),
                            'price' => $request->price_sell[$item]
                        ]);
            }
           
        }

        return redirect('/purchases')->with('status', 'Data berhasil ditambah');
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
        $data = array(
            'purchases' => Detail_Purchase::select('*', 'purchases.id as id_purchase', 'purchases.created_at as dibuat')
                                        ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                        ->join('suppliers','purchases.supplier_id','=','suppliers.id')                                        
                                        ->where('purchases.id', $purchase->id)
                                        ->first(),
            
            'detail' => Detail_Purchase::join('products','detail_purchases.product','=','products.id_product')
                                        ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                        // ->join('units', 'detail_purchases.unit_id', '=', 'units.id_unit', 'left')
                                        ->where('purchase_id', $purchase->id)
                                        ->get(),
            // 'total' => Detail_Transaction::where('transaction_id', $transaction->id)->sum('subTotal')
        );
        return view('pages.purchases.show', $data);
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

    public function getSupplier(){
        $data = Supplier::all();
        echo "<option selected value=''>-- Pilih Supplier --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id."' >".$value->name."</option>";
        }
    }

    public function getProduct(){
        $data = Product::all();
        echo "<option selected value=''>-- Pilih Produk --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id_product."' nama='".$value->name_product."' harga='".$this->rupiah($value->price)."'>".$value->name_product."</option>";
        }
    }

    public function getSatuan(){
        $data = Unit::all();
        echo "<option selected value=''>-- Satuan --</option>";
        foreach ($data as $key => $value) {
            echo "<option value='".$value->id_unit."' nama='".$value->unit."'>".$value->unit."</option>";
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

        $lastid = Product::create($request->all())->id_product;

        return response()->json(['id_product'=>$lastid]);
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
        $data = array(
            'name' => $request->name
        );

        $lastid = Brand::create($data)->id_brands;

        return response()->json(['id_brand'=>$lastid]);
    }

    public function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }
}

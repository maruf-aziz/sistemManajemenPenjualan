<?php

namespace App\Http\Controllers;

use App\Retur_Purchase;
use App\Purchase;
use App\Detail_Purchase;
use App\Detail_returpurchase;
use Illuminate\Http\Request;

class ReturpurchaseController extends Controller
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
            'retur' => Detail_returpurchase::select('*','suppliers.name as supplier', 'purchases.created_at as dibuat', 'retur_purchases.created_at as tgl_retur', 'products.name_product','detail_returpurchases.qty','detail_returpurchases.price as harga')
            ->join('retur_purchases', 'detail_returpurchases.retur_id', '=', 'retur_purchases.id_retur')
            ->join('products', 'detail_returpurchases.product', '=', 'products.id_product')
            ->join('purchases', 'retur_purchases.purchase_id', '=', 'purchases.id')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->orderby('detail_returpurchases.created_at', 'DESC')
            ->get()
        );
        return view('pages.retur.pembelian.index', $data);
    }

     /**
     * show list transaction with id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getById(Request $request){
        $id = $request->id_tr;

        // echo $id;

        $data = array(
            'purchases' => Detail_Purchase::select('*', 'purchases.id as id_purchase', 'purchases.created_at as dibuat')
                                        ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                        ->join('suppliers','purchases.supplier_id','=','suppliers.id')                                        
                                        ->where('purchases.id', $id)
                                        ->first(),
            
            'detail' => Detail_Purchase::join('products','detail_purchases.product','=','products.id_product')
                                        ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                        ->join('units', 'detail_purchases.unit_id', '=', 'units.id_unit')
                                        ->where('purchase_id', $id)
                                        ->get(),
            'new_id' => Retur_Purchase::latest()->value('id_retur'),
        );
        return view('pages.retur.pembelian.retur', $data);
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
            'transactions' => Purchase::select('purchases.id as id_pemb' , 'purchases.total_cost', 'purchases.created_at as dibuat', 'suppliers.name as nama_supplier')
                                        ->join('suppliers','purchases.supplier_id','=','suppliers.id')
                                        ->orderby('purchases.created_at', 'DESC')
                                        ->get()
        );
        return view('pages.retur.pembelian.add', $data);
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
        $data = array(
            'purchase_id'       => $request->id_transaksi,
            'desc'          => $request->desc
        );

        $lastid = Retur_Purchase::create($data)->id;

        if(!empty($request->chk)){
            if(count($request->chk) > 0){
                foreach ($request->chk as $item => $value) {
                    # code insert product
                    
                    $data_detail = array(
                        'product'    => $request->product[$item],
                        'qty'           => $request->qty[$item],
                        'price'         => $request->harga[$item],
                        'retur_id'      => $lastid
                    );

                    Detail_returpurchase::create($data_detail);

                    # code update tambah stok produk
                }
            }
        }
        else   
            echo "data kosong";

        
        return redirect('/retur_pembelian')->with('status', 'Retur berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retur_Purchase  $retur_Purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Retur_Purchase $retur_Purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retur_Purchase  $retur_Purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Retur_Purchase $retur_Purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retur_Purchase  $retur_Purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retur_Purchase $retur_Purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retur_Purchase  $retur_Purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retur_Purchase $retur_Purchase)
    {
        //
    }
}

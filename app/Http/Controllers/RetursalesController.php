<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Detail_Transaction;
use App\Retur_Sale;
use App\Detail_retursales;
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
        $data = array(
            'retur' => Detail_retursales::select('*','customers.name as pelanggan', 'transactions.created_at as dibuat', 'retur_sales.created_at as tgl_retur', 'products.name_product','detail_retursales.qty','detail_retursales.price as harga')
            ->join('retur_sales', 'detail_retursales.retur_id', '=', 'retur_sales.id_retur')
            ->join('products', 'detail_retursales.product_id', '=', 'products.id_product')
            ->join('transactions', 'retur_sales.sale_id', '=', 'transactions.id')
            ->join('customers', 'transactions.customer_id', '=', 'customers.id')
            ->orderby('detail_retursales.created_at', 'DESC')
            ->get()
        );
        return view('pages.retur.penjualan.index', $data);
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
            'transactions' => Transaction::select('*', 'customers.name AS pelanggan', 'users.name AS petugas', 'transactions.created_at AS dibuat', 'transactions.id AS id_tr')
                                                ->join('customers', 'transactions.customer_id','=','customers.id')
                                                ->join('users', 'transactions.user_id', '=', 'users.id')
                                                ->orderby('transactions.created_at','DESC')
                                                ->get()
        );
        return view('pages.retur.penjualan.add', $data);
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
            'transactions' => Transaction::select('*', 'customers.name AS pelanggan', 'users.name AS petugas', 'transactions.created_at AS dibuat', 'transactions.id AS id_tr', 'customers.address AS alamat')
                                        ->join('customers', 'transactions.customer_id','=','customers.id')
                                        ->join('users', 'transactions.user_id', '=', 'users.id')
                                        ->where('transactions.id', $id)
                                        ->orderby('transactions.created_at','DESC')
                                        ->first(),
            
            'detail' => Detail_Transaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                                        ->join('products','detail_transactions.product_id','=','products.id_product')
                                        ->join('brands','products.brand_id', '=','brands.id_brands','left')
                                        ->join('units', 'products.unit_id','=','units.id_unit')
                                        ->where('transaction_id', $id)
                                        ->get(),
            'total' => Detail_Transaction::where('transaction_id', $id)->sum('subTotal'),
            'new_id' => Retur_Sale::latest()->value('id_retur'),
        );
        return view('pages.retur.penjualan.retur', $data);
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
            'sale_id'       => $request->id_transaksi,
            'desc'          => $request->desc
        );

        $lastid = Retur_Sale::create($data)->id;

        if(!empty($request->chk)){
            if(count($request->chk) > 0){
                foreach ($request->chk as $item => $value) {
                    # code insert product
                    
                    $data_detail = array(
                        'product_id'    => $request->product[$item],
                        'qty'           => $request->qty[$item],
                        'price'         => $request->harga[$item],
                        'retur_id'      => $lastid
                    );

                    Detail_retursales::create($data_detail);

                    # code update tambah stok produk
                }
            }
        }
        else   
            echo "data kosong";

        
        return redirect('/retur_penjualan')->with('status', 'Retur berhasil ditambah');

    }

    /**
     * check function
     */
    public function cek(Request $request)
    {
        $data_product;
        if(count($request->data) > 0){
            foreach ($request->data as $item => $value) {
                # code

                $data_product = array(
                    'nama1'  => $request->nama_awal[$item],
                    'nama2'         => $request->nama_akhir[$item],
                );
            }
        }

        return response()->json(['status'=>$data_product]);
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

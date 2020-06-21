<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Detail_Transaction;
use App\Customer;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class TransactionsController extends Controller
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
            'transactions' => Transaction::select('*', 'customers.name AS pelanggan', 'users.name AS petugas', 'transactions.created_at AS dibuat', 'transactions.id AS id_tr')
                                        ->join('customers', 'transactions.customer_id','=','customers.id')
                                        ->join('users', 'transactions.user_id', '=', 'users.id')
                                        ->orderby('transactions.created_at','DESC')
                                        ->get()
        );
        return view('pages.transactions.index', $data);
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
            'customers' => Customer::orderby('name','asc')->get(),
            'products' => Product::join('brands','products.brand_id', '=','brands.id_brands')
                    ->join('units', 'products.unit_id','=','units.id_unit')
                    ->orderby('products.name_product','asc')->get(),
        );
        return view('pages.transactions.add', $data);
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

        
        $ppn = $request->tax;
        $ppn_str = preg_replace("/[^0-9]/", "", $ppn);
        $ppn_int = (int) $ppn_str;



        $data = array(
            'total_cost' => $total_int,
            'disc' => $request->disc,
            'tax' => $ppn_int,
            'user_id' => $request->user_id,
            'customer_id' => $request->customer_id
        );

        $lastId = Transaction::create($data)->id;

        if(count($request->name_product) > 0){
            foreach ($request->name_product as $item=> $val) {
                # code...
                $data2 = array(
                    'unit_price' => $request->unit_price[$item],
                    'disc_item' => $request->disc_item[$item],
                    'amount' => $request->amount[$item],
                    'subTotal' => $request->subTotal[$item],
                    'product_id' => $request->product_id[$item],
                    'transaction_id' => $lastId 
                );

                Detail_Transaction::create($data2);

                $produk = Product::where('id_product', $request->product_id[$item])->first();

                $stock = $produk->stock;

                Product::where('id_product', $request->product_id[$item])
                        ->update([
                            'stock' => ($stock - $request->amount[$item]),
                        ]);
            }
           
        }

        return redirect('/transactions')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
        $data = array(
            'transactions' => Transaction::select('*', 'customers.name AS pelanggan', 'users.name AS petugas', 'transactions.created_at AS dibuat', 'transactions.id AS id_tr', 'customers.address AS alamat')
                                        ->join('customers', 'transactions.customer_id','=','customers.id')
                                        ->join('users', 'transactions.user_id', '=', 'users.id')
                                        ->where('transactions.id', $transaction->id)
                                        ->orderby('transactions.created_at','DESC')
                                        ->first(),
            
            'detail' => Detail_Transaction::join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                                        ->join('products','detail_transactions.product_id','=','products.id_product')
                                        ->join('brands','products.brand_id', '=','brands.id_brands')
                                        ->join('units', 'products.unit_id','=','units.id_unit')
                                        ->where('transaction_id', $transaction->id)
                                        ->get(),
            'total' => Detail_Transaction::where('transaction_id', $transaction->id)->sum('subTotal')
        );
        return view('pages.transactions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //

        Transaction::where('id', $transaction->id)
                ->update([
                    'status' => 'dibatalkan'
                ]);

        if (count($request->product_id) > 0) {
            foreach ($request->product_id as $item=> $val) {
                # code...
                
                $produk = Product::where('id_product', $request->product_id[$item])->first();

                $stock = $produk->stock;

                Product::where('id_product', $request->product_id[$item])
                        ->update([
                            'stock' => ($stock + $request->amount[$item]),
                        ]);

            }
        }

        return redirect('/transactions')->with('status', 'Data berhasil dibatalkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

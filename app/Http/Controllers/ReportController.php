<?php

namespace App\Http\Controllers;

use App\Product;
use App\Detail_Transaction;
use App\Detail_Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }

    public function reportProduct(){
        return view('pages.reports.products.index');
    }

    public function getProduct(){
        $data = Product::select('*', 'products.updated_at as update')
                ->join('brands','products.brand_id', '=','brands.id_brands')
                ->join('units', 'products.unit_id','=','units.id_unit')
                ->orderby('name_product', 'asc')
                ->get();
        
        $no = 1;
        foreach ($data as $key => $value) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$value->name_product."</td>
                <td>".$value->name."</td>
                <td>".$this->rupiah($value->price)."</td>
                <td>".$value->stock."</td>
                <td>".$value->unit."</td>
                <td>".$value->update."</td>
            </tr>";
        }
    }

    public function reportPenjualan(){
        return view('pages.reports.transactions.index');
    }

    public function getTransaction(){
       $data =  Detail_Transaction::select('customers.name','detail_transactions.created_at','products.name_product','detail_transactions.unit_price', 'detail_transactions.subTotal', 'detail_transactions.amount')
                                ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                                ->join('customers','transactions.customer_id', '=','customers.id')
                                ->join('products','detail_transactions.product_id','=','products.id_product')
                                ->join('brands','products.brand_id', '=','brands.id_brands')
                                ->join('units', 'products.unit_id','=','units.id_unit')
                                ->orderby('detail_transactions.created_at', 'DESC')
                                ->get();

        $no = 1;
        foreach ($data as $key => $value) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$value->name."</td>
                <td>".$value->created_at."</td>
                <td>".$value->name_product."</td>
                <td>".$this->rupiah($value->unit_price)."</td>
                <td>".$this->rupiah($value->subTotal)."</td>
                <td>".$value->amount."</td>
            </tr>";
        }
    }

    public function searchTransaction($tanggal,$month,$tahun){
        // $q->whereDay('created_at', '=', date('d'));
        // $q->whereMonth('created_at', '=', date('m'));
        // $q->whereYear('created_at', '=', date('Y'));

        if($tanggal == 0){
            $data =  Detail_Transaction::select('customers.name','detail_transactions.created_at','products.name_product','detail_transactions.unit_price', 'detail_transactions.subTotal', 'detail_transactions.amount')
                                ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                                ->join('customers','transactions.customer_id', '=','customers.id')
                                ->join('products','detail_transactions.product_id','=','products.id_product')
                                ->join('brands','products.brand_id', '=','brands.id_brands')
                                ->join('units', 'products.unit_id','=','units.id_unit')
                                ->whereMonth('detail_transactions.created_at', $month)
                                ->whereYear('detail_transactions.created_at', $tahun)
                                ->orderby('detail_transactions.created_at', 'DESC')
                                ->get();
        }
        else{
            $data =  Detail_Transaction::select('customers.name','detail_transactions.created_at','products.name_product','detail_transactions.unit_price', 'detail_transactions.subTotal', 'detail_transactions.amount')
                                ->join('transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
                                ->join('customers','transactions.customer_id', '=','customers.id')
                                ->join('products','detail_transactions.product_id','=','products.id_product')
                                ->join('brands','products.brand_id', '=','brands.id_brands')
                                ->join('units', 'products.unit_id','=','units.id_unit')
                                ->whereDay('detail_transactions.created_at', $tanggal)
                                ->whereMonth('detail_transactions.created_at', $month)
                                ->whereYear('detail_transactions.created_at', $tahun)
                                ->orderby('detail_transactions.created_at', 'DESC')
                                ->get();
        }
        

        

        $no = 1;
        foreach ($data as $key => $value) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$value->name."</td>
                <td>".$value->created_at."</td>
                <td>".$value->name_product."</td>
                <td>".$this->rupiah($value->unit_price)."</td>
                <td>".$this->rupiah($value->subTotal)."</td>
                <td>".$value->amount."</td>
            </tr>";
        }
    }

    public function reportPembelian(){
        return view('pages.reports.purchases.index');
    }

    public function getPembelian(){
        $data = Detail_Purchase::select('suppliers.name', 'products.name_product', 'detail_purchases.amount','detail_purchases.unit','detail_purchases.value','detail_purchases.price_per_seed', 'detail_purchases.total_price','detail_purchases.created_at')
                                ->join('products','detail_purchases.product','=','products.id_product')        
                                ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                ->join('suppliers','purchases.supplier_id','=','suppliers.id')
                                ->orderby('detail_purchases.created_at', 'DESC')
                                ->get();

        $no = 1;
        foreach ($data as $key => $value) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$value->name."</td>
                <td>".$value->name_product."</td>
                <td>".$value->created_at."</td>
                <td>".$value->amount." ".$value->unit."</td>
                <td>".$value->value."/".$value->unit."</td>
                <td>".$this->rupiah($value->price_per_seed)."</td>
                <td>".$this->rupiah($value->total_price)."</td>
            </tr>";
        }
    }

    public function searchPembelian($tanggal,$month,$tahun){
        // $q->whereDay('created_at', '=', date('d'));
        // $q->whereMonth('created_at', '=', date('m'));
        // $q->whereYear('created_at', '=', date('Y'));

        if($tanggal == 0){
            $data =  Detail_Purchase::select('suppliers.name', 'products.name_product', 'detail_purchases.amount','detail_purchases.unit','detail_purchases.value','detail_purchases.price_per_seed', 'detail_purchases.total_price','detail_purchases.created_at')
                                ->join('products','detail_purchases.product','=','products.id_product')        
                                ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                ->join('suppliers','purchases.supplier_id','=','suppliers.id')
                                ->whereMonth('detail_purchases.created_at', $month)
                                ->whereYear('detail_purchases.created_at', $tahun)
                                ->orderby('detail_purchases.created_at', 'DESC')
                                ->get();
        }
        else{
            $data =  Detail_Purchase::select('suppliers.name', 'products.name_product', 'detail_purchases.amount','detail_purchases.unit','detail_purchases.value','detail_purchases.price_per_seed', 'detail_purchases.total_price','detail_purchases.created_at')
                                ->join('products','detail_purchases.product','=','products.id_product')        
                                ->join('purchases', 'detail_purchases.purchase_id', '=', 'purchases.id')
                                ->join('suppliers','purchases.supplier_id','=','suppliers.id')
                                ->whereDay('detail_purchases.created_at', $tanggal)
                                ->whereMonth('detail_purchases.created_at', $month)
                                ->whereYear('detail_purchases.created_at', $tahun)
                                ->orderby('detail_purchases.created_at', 'DESC')
                                ->get();
        }
        

        

        $no = 1;
        foreach ($data as $key => $value) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$value->name."</td>
                <td>".$value->name_product."</td>
                <td>".$value->created_at."</td>
                <td>".$value->amount." ".$value->unit."</td>
                <td>".$value->value."/".$value->unit."</td>
                <td>".$this->rupiah($value->price_per_seed)."</td>
                <td>".$this->rupiah($value->total_price)."</td>
            </tr>";
        }
    }
}

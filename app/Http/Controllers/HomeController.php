<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Customer;
use App\Product;
use App\Purchase;
use App\Detail_Purchase;
use App\User;
use App\Transaction;
use App\Detail_Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $transaction = Transaction::orderby('id', 'DESC')
        //                 ->limit('15')  
        //                 ->selectRaw('*, sum(total_cost) as total')                     
        //                 ->groupBy('date')
        //                 ->get();

        $transaction = DB::table("transactions")
                            ->select('created_at', DB::Raw('SUM(total_cost) as total'))
                            ->orderBy('id', 'DESC')
                            ->groupBy(DB::raw("MONTH(created_at)"))
                            ->limit('12')
                            ->get();

        // $purchase = Purchase::orderby('id', 'DESC')
        //                 ->limit('15')  
        //                 ->selectRaw('*, sum(total_cost) as total')                     
        //                 ->groupBy('date')
        //                 ->get();

        $purchase = DB::table("purchases")
                            ->select('created_at', DB::Raw('SUM(total_cost) as total'))
                            ->orderBy('id', 'DESC')
                            ->groupBy(DB::raw("MONTH(created_at)"))
                            ->limit('12')
                            ->get();

        $date_tr    = [];
        $total      = [];

        $date_pr    = [];
        $total_pr   = [];

        foreach ($transaction as $tr) {
            $date_tr[] = date('M', strtotime($tr->created_at));

            $total[] = (int)$tr->total;    
            
        }

        foreach ($purchase as $pr){
            $date_pr[]      = date('M', strtotime($pr->created_at));
            $total_pr[]     = (int)$pr->total;
        }

        $data = array(
            'produk'        => Product::count(),
            'pelanggan'     => Customer::count(),
            'supplier'      => Supplier::count(),
            'karyawan'      => User::count(),
            'penj'          => $date_tr,
            'total'         => $total,
            'pemb'          => $date_pr,
            'total_pemb'    => $total_pr
        );
        return view('pages.dashboard', $data);
    }
}

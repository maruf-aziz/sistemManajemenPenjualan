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
use Carbon\carbon;
use Illuminate\Http\Request;

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
        $transaction = Transaction::orderby('id', 'DESC')
                        ->limit('15')  
                        ->selectRaw('*, sum(total_cost) as total')                     
                        ->groupBy('date')
                        ->get();

        $purchase = Purchase::orderby('id', 'DESC')
                        ->limit('15')  
                        ->selectRaw('*, sum(total_cost) as total')                     
                        ->groupBy('date')
                        ->get();

        $date_tr    = [];
        $total      = [];

        $date_pr    = [];
        $total_pr   = [];

        foreach ($transaction as $tr) {
            $date_tr[] = $tr->created_at->format('d-M');

            $total[] = (int)$tr->total;    
            
        }

        foreach ($purchase as $pr){
            $date_pr[]      = $pr->created_at->format('d-M');
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

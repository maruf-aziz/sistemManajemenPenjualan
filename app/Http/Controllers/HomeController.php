<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Customer;
use App\Product;
use App\User;
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
        $data = array(
            'produk'        => Product::count(),
            'pelanggan'     => Customer::count(),
            'supplier'      => Supplier::count(),
            'karyawan'      => User::count()
        );
        return view('pages.dashboard', $data);
    }
}

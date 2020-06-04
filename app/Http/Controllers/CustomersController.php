<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
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
            'customers' => Customer::all()
        );

        return view('pages.customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'unique:App\Customer,email',
            'email' => [
                Rule::unique('customers')->where('email', !null),
            ],
            'phone' => 'required|max:13',
            'address' => 'max:255',
        ]);
        
        Customer::create($request->all());

        return redirect('/customers')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        return view('pages.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'unique:App\Customer,email->ignore($customer->email)',
            'email' => [
                Rule::unique('customers')->ignore($customer->id),
            ],
            'phone' => 'required|max:13',
            'address' => 'max:255',
        ]);
        
        Customer::where('id', $customer->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);

        return redirect('/customers')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        Customer::destroy($customer->id);
        return redirect('/customers')->with('status', 'Data berhasil dihapus');
    }
}

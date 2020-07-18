<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuppliersController extends Controller
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
            'suppliers' => Supplier::all()
        );
        return view('pages.suppliers.index', $data);
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
            // 'email' => 'unique:App\Supplier,email',
            'email' => [
                Rule::unique('suppliers')->where('email', !null),
            ],
            'phone' => 'required|max:13',
            'addesss' => 'max:255'
        ]);
        
        Supplier::create($request->all());

        return redirect('/suppliers')->with('status', 'Data berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
        return view('pages.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'unique:App\Supplier,email->ignore($supplier->email)',
            'email' => [
                Rule::unique('suppliers')->ignore($supplier->id),
            ],
            'phone' => 'required|max:13',
            'addesss' => 'max:255'
        ]);

        Supplier::where('id', $supplier->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]);
        
        return redirect('/suppliers')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
        Supplier::destroy($supplier->id);
        return redirect('/suppliers')->with('status', 'Data berhasil dihapus');
    }
}

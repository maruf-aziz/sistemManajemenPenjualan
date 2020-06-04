<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
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
            'users' => User::all()
        );
        return view('pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.users.add');
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
            'email' => 'required|email:rfc,dns|unique:App\User,email',
            'images' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'required|max:13',
            'role' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'address' => 'max:255',
            'description' => 'max:255'
        ]);

        if ($request->file('images') != null) {
            # code...
            $images = $request->file('images');

            $nama_file = time()."_".$images->getClientOriginalName();
            $tujuan_upload = 'images';
            $images->move($tujuan_upload,$nama_file);
        }

        else{
            $nama_file = 'default.png';
        }
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'images' => $nama_file,
            'phone' => $request->phone,
            'address' => $request->address,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'description' => $request->descrtiption
        ]);

        return redirect('/users')->with('status', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('pages.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'required|email:rfc,dns|unique:App\User,email->ignore($user->email)',
            'email' => [
                Rule::unique('users')->ignore($user->id),
            ],         
            'phone' => 'required|max:13',
            'images' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'address' => 'max:255',
            'description' => 'max:255'
        ]);

        if ($request->password != null) {
            # code...
            $request->validate([
                'password' => 'string|min:8|confirmed'
            ]);
        }

        if ($request->file('images') != null) {
            # code...
            $file = $request->file('images');
 
            $nama_file = time()."_".$file->getClientOriginalName();

            if ($user->file != null) {
                # code...
                $path = public_path()."/images/".$user->file;
                unlink($path);
            }
            

            $tujuan_upload = 'images';
            $file->move($tujuan_upload,$nama_file);
        }

        User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'role' => ($request->role != null ? $request->role : $user->role),
                    'password' => ($request->password != null ? Hash::make($request->password) : $user->password),
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'description' => $request->description,
                    'address' => $request->address,
                    'images' => ($request->file('images') != null ? $nama_file : $user->images),
                ]);
        
        return redirect('/users')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        return redirect('/users')->with('status', 'Data berhasil dihapus');
    }
}

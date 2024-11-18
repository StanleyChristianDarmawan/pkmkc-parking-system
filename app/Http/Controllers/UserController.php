<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status', 1)->get();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required',
            'nohp' => 'required|numeric',
            'level' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah ada',
            'password.required' => 'Password wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'nohp.required' => 'No hp wajib diisi',
            'nohp.numeric' => 'Harus berupa angka',
        ]);

        // return $validatedData;

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'], 
            'nama' => $validatedData['nama'], 
            'nohp' => $validatedData['nohp'], 
            'level' => $validatedData['level']
        ]);

        $user->save();

        return redirect('/user')->with('success', 'Petugas berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->status == 0 ) return back()->with('error', 'Data tidak ditemukan');
        else
        {
            $user = User::where('id', $user->id)->first();
            return view('user.edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user->status == 0) return back()->with('error', 'Data tidak ditemukan');

        $rules = [
            'username' => 'required',
            'level' => 'required',
            'nama' => 'required',
            'nohp' => 'required',
        ];

        $validator = [
            'username.required' => 'Username wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'nohp.required' => 'No hp wajib diisi',
        ];

        if($user->username != $request->username)
        {
            $rules['username'] = 'unique:users';
            $validator['username.unique'] = 'Username sudah ada';

        } 
        
        if($user->nohp != $request->nohp)
        {
            $rules['nohp'] = 'numeric';
            $validator['nohp.unique'] = 'No hp sudah terdaftar';
            $validator['nohp.numeric'] = 'Harus berupa angka';

        }    

        $validatedData = $request->validate($rules, $validator);
        
        User::where('id', $user->id)->update([
            'username' => $validatedData['username'],
            'level' => $validatedData['level'],
            'nama' => $validatedData['nama'],
            'nohp' => $validatedData['nohp'],

        ]);

        return redirect('/user')->with('success', 'Petugas berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::where('id', $id)->first()->status == 0) return back()->with('error', 'Data tidak ditemukan');
        //cek id yang sedang login
        $logged_id = auth()->user()->id;

        //hapus 
        User::where('id', $id)->update([
            'status' => 0
        ]);

        
        //jika admin menghapus akun lain
        if($logged_id != $id)
        return redirect('/user' )->with('success', 'Petugas telah dihapus'); 
        
        //jika admin menghapus akunnya sendiri
        else 
        return redirect('/logout');
        
    }
}

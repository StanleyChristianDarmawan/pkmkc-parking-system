<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = Tarif::where('status', 1)->get();
        return view('tarif.index', compact('tarif'));
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
        // return $request;
        // $request->tarif = (int)str_replace(".", "", $request->tarif);

        $rules = [
            'jenis_kendaraan' => 'required|unique:tarif',
            'tarif' => 'required|numeric',
            'waktu_maks' => 'required_if:tarif_maks,1',
            'tarif_maks' => 'required_if:waktu_maks,1',
        ];
        
        $validator = [
            'jenis_kendaraan.required' => 'Kendaraan wajib diisi',
            'jenis_kendaraan.unique' => 'Kendaraan sudah ada',
            'tarif.required' => 'Tarif wajib diisi',
            'tarif.numeric' => 'Harus berupa angka',
            'waktu_maks.required' => 'Waktu Maksimal wajib diisi',
            'waktu_maks.numeric' => 'Harus berupa angka',
            'tarif_maks.required' => 'Tarif Maksimal wajib diisi',
            'tarif_maks.numeric' => 'Harus berupa angka',
        ];

        if($request->waktu_maks != null || $request->tarif_maks != null)
        {
            $rules['waktu_maks'] =    'required|numeric';
            $rules['tarif_maks'] =    'required|numeric';

        }


        $validatedData = $request->validate($rules, $validator);

        $validatedData['jenis_kendaraan'] = strtolower($validatedData['jenis_kendaraan']);

        $tarif = Tarif::create($validatedData);

        $tarif->save();

        return redirect('/tarif')->with('success', 'Tarif kendaraan berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $tarif)
    {
        
        if($tarif->status == 0) return back()->with('error', 'Data tidak ditemukan');

        else return view('tarif.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarif $tarif)
    {
        if($tarif->status == 0) return back()->with('error', 'Data tidak ditemukan');

        // $request->jenis_kendaraan = strtolower($request->jenis_kendaraan);

        $rules = [
            'jenis_kendaraan' => 'required',
            'tarif' => 'required|numeric',
            'waktu_maks' => 'required_if:tarif_maks,1',
            'tarif_maks' => 'required_if:waktu_maks,1',
        ];

        $validator = [
            'jenis_kendaraan.required' => 'Kendaraan wajib diisi',
            'jenis_kendaraan.unique' => 'Kendaraan sudah ada',
            'tarif.required' => 'Tarif wajib diisi',
            'tarif.numeric' => 'Harus berupa angka',
            'waktu_maks.required' => 'Waktu Maksimal wajib diisi',
            'waktu_maks.numeric' => 'Harus berupa angka',
            'tarif_maks.required' => 'Tarif Maksimal wajib diisi',
            'tarif_maks.numeric' => 'Harus berupa angka',
        ];

        if($tarif->jenis_kendaraan != strtolower($request->jenis_kendaraan))
        {
            $rules['jenis_kendaraan'] = 'unique:tarif';
        } 
        
        if($request->waktu_maks != null || $request->tarif_maks != null)
        {
            $rules['waktu_maks'] =    'required|numeric';
            $rules['tarif_maks'] =    'required|numeric';

        }

        $validatedData = $request->validate($rules, $validator);

        $validatedData['jenis_kendaraan'] = strtolower($validatedData['jenis_kendaraan']);
        
        Tarif::where('id', $tarif->id)->update($validatedData);

        return redirect('/tarif')->with('success', 'Tarif kendaraan berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Tarif::where('id', $id)->first()->status == 0) return back()->with('error', 'Data tidak ditemukan');

        Tarif::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect('/tarif')->with('success', "Tarif Kendaraan telah dihapus");

    }
}

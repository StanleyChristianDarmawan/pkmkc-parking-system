<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use App\Models\Parkir;
use App\Models\Tarif;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ParkirController extends Controller
{

    // -- halaman user

    public function index()
    {
        $tarif = Tarif::where('status', 1)->get();
        return view('index', compact('tarif'));
    }

    public function create(Request $request) 
    {
        $id_jenis = Tarif::where('jenis_kendaraan', $request->jenis)->value('id');
        $jenis_kendaraan = $request->jenis;
        $latest = Parkir::latest()->first() ?? new Parkir();
       
        $kode_parkir = 'P' . $id_jenis . '-' . tambah_nol_didepan(($latest->id + 1), 6);

        $parkir = Parkir::create([
            'id_tarif' => $id_jenis,
            'kode_parkir' => $kode_parkir,
            'harga' => 0,
            'status' => 1,
            'plat' => '0',
            'durasi' => '0',
        ]);

        $parkir->save();

        return redirect('/struk/' . $parkir->kode_parkir);
        
    }



    public function checkPrinter($device)
    {
        try {
            $connector = new WindowsPrintConnector($device);
            $printer = new Printer($connector);

            $printer->close(); 
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function struk($kode_parkir)
    {
      
        $prints = Parkir::where('kode_parkir', $kode_parkir)->get();

        if($this->checkPrinter("TM-T82")){
            return view('struk_masuk.struk', compact('print'));
        }
        else{
            return view('struk_masuk.struk_digital', compact('prints'));
        }
    }

    // -- end halaman user




    // -- index transaksi parkir --
    public function show()
    {
        $parkir = Parkir::where('id_user', null)->get();
        return view('transaksi.index', compact('parkir'));
    }

    // -- transaksi detail --
    public function edit(Request $request)
    {
        $kode_parkir = $request->kode_parkir;
        $parkir = Parkir::where('kode_parkir', $kode_parkir)->first();

        if($parkir == null || $parkir->status == 0) return back()->with('error', 'Kode parkir tidak ditemukan');
        else{
            $id_user = auth()->user()->id;
    
            $start = Carbon::parse($parkir->created_at);
            $end = Carbon::now();
            $hours = Carbon::now()->diffInHours($parkir->created_at);
            $duration = $start->diff($end)->format('%adays %hhours %imin');
    
            $tarif = $parkir->tarif->tarif;

            // cek apakah ada batas maksimal
            if($parkir->tarif->waktu_maks != 0 && $parkir->tarif->tarif_maks != 0) 
            {
                // cek apakah user melebihi batas maksimal
                if( $hours + 1 >= $parkir->tarif->waktu_maks ) $harga = $parkir->tarif->tarif_maks;
                else $harga = ($hours + 1) * $tarif;
            }
            else $harga = ($hours + 1) * $tarif;

            
    
            return view('transaksi.detail', compact('id_user', 'tarif', 'kode_parkir', 'harga', 'start', 'duration', 'end'));

        }
    }

    // -- simpan transaksi --
    public function update(Request $request)
    {
        // return $request;

        $validatedData = $request->validate([
            'id_user' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
            'plat' => 'required',
        ], [
            'plat.required' => 'Plat wajib diisi'
        ]);

        $parkir = Parkir::where('kode_parkir', $request->kode_parkir);

        $parkir->update([
            'id_user' => $validatedData['id_user'],
            'durasi' => $validatedData['durasi'],
            'harga' => $validatedData['harga'],
            'status' => 0,
            'plat' => $validatedData['plat']
        ]);

        return redirect('/struk-keluar/' . $request->kode_parkir);

    }

    public function keluar($kode_parkir)
    {

        $prints = Parkir::where('kode_parkir', $kode_parkir)->get();

        // cek apakah terhubung ke TM-T82
        if($this->checkPrinter("TM-T82")){
            return view('struk_keluar.struk', compact('prints'));
        }
        else{
            return view('struk_keluar.struk_digital', compact('prints'));
        }
        
        
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use App\Models\Tarif;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // $masuk = Parkir::where('status', 1)->whereBetween('updated_at', 
        // [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();

        //hitung jumlah petugas & kendaraan masuk
        $petugas = User::where('status', 1)->count();
        $masuk = Parkir::where('status', 1)->count();

        //hitung jumlah kendaraan keluar berdasarkan level
        if(auth()->user()->level == 1)
        {
            $keluar = Parkir::where('status', 0)->whereBetween('updated_at', 
            [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();


        } else {

            $keluar = Parkir::where('status', 0)->where('id_user', auth()->user()->id)->whereBetween('updated_at', 
            [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();

        }

        //hitung pemasukan perhari
        $perhari = number_format( Parkir::where('status', 0)->whereBetween('updated_at', 
        [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('harga') , 0 , '.', '.');

        //hitung pemasukan perbulan
        $perbulan = number_format( Parkir::where('status', 0)->whereBetween('updated_at', 
        [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('harga') , 0, '.', '.');


        //data grafik 
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'];
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'];
        
        //hitung pemasukan pertahun
        $pertahun = Parkir::where('status', 0)->get()
                ->whereBetween('updated_at', 
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
                ->groupBy(function($pertahun){
                
                return Carbon::parse($pertahun->updated_at)->format('M');
        });


        //hitung motor pertahun
        $motor = Parkir::where('status', 0)
                ->where('id_tarif', 1)->get()
                ->whereBetween('updated_at', 
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
                ->groupBy(function($motor){
                
                return Carbon::parse($motor->updated_at)->format('M');
        });

        //hitung mobil pertahun
        $mobil = Parkir::where('status', 0)
                ->where('id_tarif', 2)->get()
                ->whereBetween('updated_at', 
                [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
                ->groupBy(function($motor){
                
                return Carbon::parse($motor->updated_at)->format('M');
        });

        $hitung_motor = [];
        $hitung_mobil = [];
        $hitung_pertahun = [];

        // foreach($motor as $bulan => $value)
        // {
        //     $bulan[] = $bulan;
        //     $hitung_motor[] = count($value);
        // }

        // foreach($mobil as $bulan => $value)
        // {
        //     $hitung_mobil[] = count($value);
        // }

        // foreach($pertahun as $bulan => $value)
        // {
        //     $hitung_pertahun[] = $value;
        // }

        
        foreach ($months as $months)
        {
            if(empty($motor[$months])) $hitung_motor[] = 0;
            else $hitung_motor[] = count($motor[$months]);
             
            if(empty($mobil[$months])) $hitung_mobil[] = 0;
            else $hitung_mobil[] = count($mobil[$months]);
            
            if(empty($pertahun[$months])) $hitung_pertahun[] = 0;
            else $hitung_pertahun[] = $pertahun[$months]->sum('harga');

        }

        return view('dashboard', compact('masuk', 'keluar', 'perhari', 'perbulan', 'petugas', 'bulan', 'hitung_mobil', 'hitung_motor', 'hitung_pertahun'));

    }
}

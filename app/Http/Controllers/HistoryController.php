<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use App\Models\Tarif;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
        // -- halaman utama riwayat --
        public function history()
        {
            if(auth()->user()->level == 1)
            {
                return view('riwayat.index', [
                    'history' => Parkir::where('status', 0)->orderBy('updated_at', 'desc')->get(),
                ]);
    
            }
            else {
    
                return view('riwayat.index', [
                    'history' => Parkir::where('status', 0)->where('id_user', auth()->user()->id)->get(),
                ]);
            }
        }
    
        // -- halaman filter--
        public function filter()
        {
            return view('riwayat.filter', [
                'user' => User::where('status', 1)->get(),
                'tarif' => Tarif::where('status', 1)->get()
            ]);
        }
    
        public function sort(Request $request)
        {
            //  return $request;
    
            if(auth()->user()->level == 1)
            {
                $validatedData = $request->validate([
                    'id_user' => 'required',
                    'id_tarif' => 'required',
                    'start' => 'required',
                    'end' => 'required',
                ], [
                    'id_user.required' => 'Nama karyawan wajib diisi',
                    'id_tarif.required' => 'Jenis kendaraan wajib diisi',
                    'start.required' => 'Waktu awal wajib diisi',
                    'end.required' => 'Waktu akhir wajib diisi',
                ]);
        
                $validatedData['start'] = Carbon::parse($validatedData['start'])->startOfDay();
                $validatedData['end'] = Carbon::parse($validatedData['end'])->endOfDay();
        
                $history = Parkir::where('id_user', $validatedData['id_user'])
                                ->where('id_tarif', $validatedData['id_tarif'])
                                ->whereBetween('updated_at', [$validatedData['start'], $validatedData['end']])
                                ->get();
    
            }
    
            else {
    
                $id = auth()->user()->id;
    
                $validatedData = $request->validate([
                    'id_tarif' => 'required',
                    'start' => 'required',
                    'end' => 'required',
                ], [
                    'id_tarif.required' => 'Jenis kendaraan wajib diisi',
                    'start.required' => 'Waktu awal wajib diisi',
                    'end.required' => 'Waktu akhir wajib diisi',
                ]);
        
                $validatedData['start'] = Carbon::parse($validatedData['start'])->startOfDay();
                $validatedData['end'] = Carbon::parse($validatedData['end'])->endOfDay();
        
                $history = Parkir::where('id_user', $id)
                                ->where('id_tarif', $validatedData['id_tarif'])
                                ->whereBetween('updated_at', [$validatedData['start'], $validatedData['end']])
                                ->get();
            }
    
            // return $validatedData;
            //  return $history;
    
            return view('riwayat.index', compact('history'));
    
        }

        public function detail($id)
        {
            $history = Parkir::where('id', $id)->get();
            if(auth()->user()->level != 1 && $history->id_user != auth()->user()->id) return back()->with('error', 'Data tidak dapat diakses');

            else return view('riwayat.detail', compact('history'));
        }
    
}

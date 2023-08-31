<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KlasemenController extends Controller
{
    public function index(Request $request) {
        if ($request->has('dataClub')) {
            $this->validate($request, [
                'nama' => 'min:3|unique:data,nama',
                'kota' => 'min:3|unique:data,nama',
            ]);

            $data = new Data();
            $data->nama = $request->nama;
            $data->kota = $request->kota;
            if ($data->save()) {
                Alert::success('Success', 'Data Berhasil Di Tambah!');
                return redirect('/');
            }
        }

        return view('home',['data' => Data::all()]);
    }

    public function update(Request $request) {
        if ($request->has('submit')) {
            $this->validate($request, [
                'club1'     => 'required',
                'club2'     => 'required',
                'score1'    => 'required',
                'score2'    => 'required',
            ]);

            if ($request->club1 == $request->club2) {
                Alert::error('Gagal', 'Club Tidak Boleh Sama!');
                return redirect('/update');
            }

            $score1 = $request->score1;
            $score2 = $request->score2;

            if ($score1 > $score2) {
                    // Klub 1 menang, Klub 2 kalah
                    $club1Result = $request->club1;
                    $club2Result = $request->club2;

                    // Update Data Klub 1 (Klub yang Menang)
                    Data::where('nama', $club1Result)->update([
                        'menang' => DB::raw('menang + 1'),
                        'main' => DB::raw('main + 1'),
                        'gm' => DB::raw('gm + ' . $score1),
                        'gk' => DB::raw('gk + ' . $score2),
                        'point' => DB::raw('point + 3'),
                    ]);

                    // Update Data Klub 2 (Klub yang Kalah)
                    Data::where('nama', $club2Result)->update([
                        'kalah' => DB::raw('kalah + 1'),
                        'main' => DB::raw('main + 1'),
                        'gm' => DB::raw('gm + ' . $score2),
                        'gk' => DB::raw('gk + ' . $score1),
                    ]);

                    Alert::success('Success', 'Data Berhasil Di Update!');
                    return redirect('/');
            } elseif ($score1 < $score2) {
                // Klub 1 menang, Klub 2 kalah
                $club1Result = $request->club1;
                $club2Result = $request->club2;

                // Update Data Klub 1 (Klub yang Menang)
                Data::where('nama', $club1Result)->update([
                    'menang' => DB::raw('menang + 1'),
                    'main' => DB::raw('main + 1'),
                    'gm' => DB::raw('gm + ' . $score1),
                    'gk' => DB::raw('gk + ' . $score2),
                    'point' => DB::raw('point + 3'),
                ]);

                // Update Data Klub 2 (Klub yang Kalah)
                Data::where('nama', $club2Result)->update([
                    'kalah' => DB::raw('kalah + 1'),
                    'main' => DB::raw('main + 1'),
                    'gm' => DB::raw('gm + ' . $score2),
                    'gk' => DB::raw('gk + ' . $score1),
                ]);

                Alert::success('Success', 'Data Berhasil Di Update!');
                return redirect('/');

            } else {
                if ($score1 == $score2) {
                    // Pertandingan berakhir seri
                    $club1Result = $request->club1;
                    $club2Result = $request->club2;

                    // Update Data Klub 1 (Seri)
                    Data::where('nama', $club1Result)->update([
                        'seri' => DB::raw('seri + 1'),
                        'main' => DB::raw('main + 1'),
                        'gm' => DB::raw('gm + ' . $score1),
                        'gk' => DB::raw('gk + ' . $score2),
                        'point' => DB::raw('point + 1'),
                    ]);

                    // Update Data Klub 2 (Seri)
                    Data::where('nama', $club2Result)->update([
                        'seri' => DB::raw('seri + 1'),
                        'main' => DB::raw('main + 1'),
                        'gm' => DB::raw('gm + ' . $score2),
                        'gk' => DB::raw('gk + ' . $score1),
                        'point' => DB::raw('point + 1'),
                    ]);

                    Alert::success('Success', 'Data Berhasil Di Update!');
                    return redirect('/');
                }

            }
        }
        return view('update',['data' => Data::all()]);
    }
}

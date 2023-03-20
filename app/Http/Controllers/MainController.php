<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perkuliahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getMahasiswa()
    {
        $data = Mahasiswa::all(['nim', 'nama', 'angkatan', 'prodi', 'alamat']);
        return response([
            'data' => $data
        ]);
    }
    public function getDosen()
    {
        $data = Dosen::all(['nidn', 'nama', 'alamat']);
        return response([
            'data' => $data
        ]);
    }
    public function getMataKuliah()
    {
        $data = MataKuliah::all(['kode', 'nama', 'sks', 'semester']);
        return response([
            'data' => $data
        ]);
    }

    public function getPerkuliahan(Request $request)
    {
        $param = $request->query()['nim'];
        
        $data = DB::table('perkuliahans')
                ->join('mahasiswas', 'mahasiswas.id', '=', 'perkuliahans.mahasiswa_id')
                ->join('mata_kuliahs', 'mata_kuliahs.id', '=', 'perkuliahans.matakuliah_id')
                ->join('dosens', 'dosens.id', '=', 'perkuliahans.dosen_id')
                ->where('mahasiswas.nim', '=', $param)
                ->get([
                    'mahasiswas.nama as mahasiswa',
                    'dosens.nama as dosen', 
                    'mata_kuliahs.nama as mata_kuliah', 
                    'mata_kuliahs.sks', 
                    'mata_kuliahs.semester', 
                    'mata_kuliahs.kode', 
                    'perkuliahans.nilai'
                ]);
        
        return response([
            'data' => $data
        ]);
    }
}

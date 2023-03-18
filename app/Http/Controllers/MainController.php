<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

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
}

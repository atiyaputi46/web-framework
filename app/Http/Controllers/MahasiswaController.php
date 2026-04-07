<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Ini adalah halaman mahasiswa";
    }

    public function insertSql()
    {
        $query = DB::insert("INSERT INTO students (
            nim,
            nama_lengkap,
            tempat_lahir,
            tgl_lahir,
            email,
            prodi,
            alamat,
            created_at,
            updated_at
        ) VALUES (
            '2401091003',
            'Atiya Puti Betriyona',
            'Padang',
            '2006-01-05',
            'Atiyaputi@gmail.com',
            'MI',
            'Jl. Perintis Kemerdekaan no. 100',
            NOW(),
            NOW())");
    }
}
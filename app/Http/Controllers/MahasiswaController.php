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
            '2401091000',
            'NAufal Taqiy',
            'Bangko',
            '2005-06-07',
            'NaufalTaqiy@gmail.com',
            'Logbis',
            'Jl. Perintis Kemerdekaan no. 100',
            NOW(),
            NOW())");
    }
    
    public function insertPrepared()
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
        ) VALUES (?,?,?,?,?,?,?,?,?)", [
            '2401091004',
            'Atiya Puti Betriyona',
            'Padang',
            '2006-01-05',
            'atiyaputi@gmail.com',
            'MI',
            'Jl. Perintis Kemerdekaan no. 100',
            NOW(),
            NOW()
        ]);
}

    public function insertBinding()
    {
        $nim = '2401091005';
        $nama_lengkap = 'Atiya Puti Betriyona';
        $tempat_lahir = 'Padang';
        $tgl_lahir = '2006-01-05';
        $email = 'atiyaputi@gmail.com';
        $prodi = 'MI';
        $alamat = 'Jl. Perintis Kemerdekaan no. 100';

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
        ) VALUES (?,?,?,?,?,?,?,?,?)", [
            $nim,
            $nama_lengkap,
            $tempat_lahir,
            $tgl_lahir,
            $email,
            $prodi,
            $alamat,
            NOW(),
            NOW()
        ]);
    }

    public function update()
    {
        $query = DB::update("UPDATE students SET nama_lengkap = 'Atiya Puti Betriyona Cantik' WHERE nim = '2401091003'");
    }

    public function delete()
    {
        $query = DB::delete("DELETE FROM students WHERE nim = '2401091003'");
    }

    public function select()
    {
        $query = DB::select("SELECT * FROM students");
        return $query;
    }

    public function selectTampil()
    {
        $query = DB::select("SELECT * FROM students");
        foreach($query as $q){
            echo "NIM : $q->nim <br>";
            echo "Nama Lengkap : $q->nama_lengkap <br>";
            echo "Tempat Lahir : $q->tempat_lahir <br>";
            echo "Tanggal Lahir : $q->tgl_lahir <br>";
            echo "Email : $q->email <br>";
            echo "Prodi : $q->prodi <br>";
            echo "Alamat : $q->alamat <br>";
            echo "<hr>";
        }
    }
    
    public function selectView()
    {
        $query = DB::select("SELECT * FROM students");
        return view('akademik.mahasiswa')->with('students', $query);
    }

    public function selectWhere()
    {
        $query = DB::select("SELECT * FROM students WHERE prodi = 'MI'");
        return view('akademik.mahasiswa')->with('students', $query);
    }

    public function statement()
    {
        $query = DB::statement("TRUNCATE TABLE students");
        return ('Tabel Mahaiswa berhasil dikosongkan');
    }
}
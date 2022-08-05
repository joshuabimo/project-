<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Hasfactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SiswaModel extends Model
{
    public function allData()
{
    return DB::table('tbl_siswa')->get();
}

public function addData($data)
{
    DB::table('tbl_siswa')->insert($data);
}

public function deleteData($id_siswa)
    {
        DB::table('tbl_siswa')
        ->where('id_siswa',$id_siswa)
        ->delete();
    }

   
}

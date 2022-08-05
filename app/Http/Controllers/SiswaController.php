<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->SiswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'siswa' => $this->SiswaModel->allData(),
        ];
        return view('v_siswa', $data);
    }

    public function add()
    {
        return view('v_addsiswa');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tbl_siswa,nip|min:4|max:5',
            'nama_siswa' => 'required',
            'mapel' => 'required',
        ], [
            'nip.required' => 'wajib diisi !!',
            'nip.unique' => 'nip ini sudah ada !!',
            'nip.min' => 'min 4 karakter',
            'nip.max' => 'max 5 karakter',
            'nama_siswa.required' => 'wajib diisi !!',
            'mapel.required' => 'wajib diisi !!',
           
        ]);

        $data = [
            'nip' => Request()->nip,
            'nama_siswa' => Request()->nama_siswa,
            'mapel' => Request()->mapel,
            
        ];

        $this->SiswaModel->addData($data);
        return redirect()->route('siswa')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function delete($id_siswa)
    
    {
        $this->SiswaModel->deleteData($id_siswa);
        return redirect()->route('siswa')->with('pesan', 'Data Berhasil Di Dihapus !!!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voting;
use App\Models\akun;
use App\Models\kandidat;


class VotingController extends Controller
{
    public function __construct(){
        $this ->voting = new Voting();
        $this ->akun = new akun();
        $this ->kandidat = new kandidat();
       
    }

    public function index() {
        if(!session('login')){
            return redirect('/');
        }else{
        $alldata = [
            'allvoting' => $this->voting->alldata(), // mengambil class pada models alldata
        ];
        return view('voting.voting', $alldata);
    }
}


 // ke form tambah
 public function tambah()
{
    if(!session('login')){
        return redirect('/');
    }else{
    $alldata = [
        'voting'=>$this->voting->alldata(), // mengambil class pada models alldata
        'akun'=>$this->akun->alldata(),
        'kandidat'=>$this->kandidat->alldata(),
    ];
    return view('kandidat.tambah', $alldata);
}
}

    /**
     * Store a newly created resource in storage.
     */
    public function save(){
            // Validasi input
            Request()->validate([
                'nis_nip' => 'required|max:255',
                'nama_lengkap' => 'required|max:50',
                'kelas' => 'required|max:50',
                'id_kandidat' => 'required',
                'tgl_memilih' => 'required',
            ], [
                'user.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
            ]);
            
            // Data yang akan disimpan
            $data = [
                'nis_nip' => request()->nis_nip,
                'nama_lengkap' => request()->nama_lengkap,
                'kelas' => request()->kelas,
                'id_kandidat' => request()->id_kandidat,
                'tgl_memilih' =>request()->tgl_memilih,
            ];
            
            // Menyimpan data ke database
            $this->voting->addData($data);
            return redirect()->route('voting', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
        }

    /**
     * Display the specified resource.
     */
    public function editakandidat($nis_nip){
        if(!session('login')){
            return redirect('/');
        }else{
 
        $data = [
            'main'=>$this->voting->editakandidat($nis_nip),
            'allakun'=>$this->akun->alldata(),
            'allkandidat'=>$this->kandidat->alldata(),
        ];
        return view('voting.edit', $data);
    }
}


    public function update(Request $request, $nis_nip)
    {
        $voting = $this->voting->find($nis_nip);

        if (!$voting) {
            return redirect()->route('voting')->with('error', 'Data tidak ditemukan');
        }

        // Validasi input
        $request->validate([
            'nis_nip' => 'required|max:255',
                'nama_lengkap' => 'required|max:50',
                'kelas' => 'required|max:50',
                'id_kandidat' => 'required',
                'tgl_memilih' => 'required',
        ], [
            'user.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
        ]);

           
        }

        // Perbarui data lainnya
        $voting->nis_nip = $request->nis_nip;
        $voting->nama_lengkap = $request->nama_lengkap;
        $voting->id_kandidat = $request->id_kandidat;
        $voting->tgl_memilih = $request->tgl_memilih;

        $voting->save();

        return redirect()->route('voting', ['update' => 'berhasil']);
        // return redirect()->route('kandidat')->with('success', 'Data berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function hapusData($nis_nip){
        if(!session('login')){
            return redirect('/');
        }else{
        $voting = voting::where('nis_nip', $nis_nip)->first();
            try {
    
                // Hapus data pengguna dari database
                $->delete();
    
                return redirect()->route('kandidat', ['hapus' => 'berhasil']);
              
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan lahan!']);
            }
    }
}
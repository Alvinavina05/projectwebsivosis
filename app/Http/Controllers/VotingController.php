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

    public function voting() {
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
 public function tambah(){
    if(!session('login')){
        return redirect('/');
    }else{

        $alldata = [
            'voting'=>$this->voting->alldata(), // mengambil class pada models alldata
            'akun'=>$this->akun->alldata(),
            'kandidat'=>$this->kandidat->alldata(),
        ];
        return view('voting.tambahvoting', $alldata);
    }
}

// simpan data
public function simpan(){
    Request()->validate([
        'nis_nip' => 'required|max:155',
        'nama_lengkap' => 'required|max:255',
        'kelas' => 'required|max:255',
        'id_kandidat' => 'required|max:255',
        'tgl_memilih' => 'required|max:255',

    ],[
        
        'nama.required' => 'nama wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
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
   $this->voting->addpesan($data);
   return redirect()->route('voting', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
}



// ke form edit
public function edit($nis_nip){
    if(!session('login')){
        return redirect('/');
    }else{
    $data = [
        'main'=>$this->voting->editakandidat($nis_nip),
            'allakun'=>$this->akun->alldata(),
            'allkandidat'=>$this->kandidat->alldata(),
    ];
    return view ('voting.edit',$data);
}
}


// update
public function update($nis_nip){
    request()->validate([
        'nis_nip' => 'required|max:155',
        'nama_lengkap' => 'required|max:255',
        'kelas' => 'required|max:255',
        'id_kandidat' => 'required|max:255',
        'tgl_memilih' => 'required|max:255',
    ],[
        'nama.required' => 'judul wajib diisi yah',
        'status.required' => 'status wajib diisi yah',
        'pesan.required' => 'pesan wajib diisi yah',
    ]);

    $data = [
        'nis_nip' => Request()->nis_nip,
        'nama_lengkap' => Request()->nama_lengkap,
        'kelas' => request()->kelas,
        'id_kandidat' => request()->id_kandidat,
        'tgl_memilih' =>request()->tgl_memilih,
    ];

    $this->voting->ubahdata($nis_nip, $data);

    return redirect()->route('voting');
}

public function hapus($nis_nip){
    if(!session('login')){
        return redirect('/');
    }else{

    $this->voting->hapus($nis_nip);
    return redirect()->route('voting');
    }
}

}
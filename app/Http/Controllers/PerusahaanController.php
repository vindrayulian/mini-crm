<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;




class PerusahaanController extends Controller
{
    public function perusahaan(Request $req){

        if($req->has('search')){
            $isi = Perusahaan::where('nama','LIKE','%'.$req->search.'%')->paginate(10);
        } else{
            $isi = Perusahaan::paginate(10);
        }

        return view('data/dataperusahaan',compact('isi'));
    }

    public function tambahperusahaan(){
        return view('data/tambahperusahaan');
    }

    public function insertperusahaan(Request $req){
        // dd($req->all());

        $this->validate($req,[
            'nama' => 'required|min:4|max:30',
            'email' => 'required|min:4|max:30',
            'website' => 'required|max:30',
            'logo' => 'required|file|dimensions:min_width=100,min_height=100',
        ]);

        $isi = Perusahaan::create($req->all());
        if($req->hasFile('logo')){
            $req->file('logo')->move('logoperusahaan/', $req->file('logo')->getClientOriginalName());
            $isi->logo = $req->file('logo')->getClientOriginalName();
            $isi->save();
        }

        return redirect()->route('perusahaan')->with('sukses','Data Berhasil Di Tambahkan');
    }

    public function tampilperusahaan($id){
        $isi = Perusahaan::find($id);
        // dd($data);
        return view('data/tampilperusahaan', compact('isi'));
    }

    public function editperusahaan(Request $req, $id){
        $isi = Perusahaan::find($id);
        $isi->update($req->all());
        if($req->hasFile('logo')){
            $req->file('logo')->move('logoperusahaan/', $req->file('logo')->getClientOriginalName());
            $isi->logo = $req->file('logo')->getClientOriginalName();
            $isi->save();
        }
        return redirect()->route('perusahaan')->with('sukses','Data Berhasil Di Edit');
    }

    public function hapus($id){
        $isi = Perusahaan::find($id);
        $isi->delete();
        return redirect()->route('perusahaan')->with('sukses','Data Berhasil Di Hapus');
    }
}

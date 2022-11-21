<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class PekerjaController extends Controller
{
    public function index(Request $req){

        if($req->has('search')){
            $data = Pekerja::where('firstnama','LIKE','%'.$req->search.'%')->paginate(10);
        } else{
            $data = Pekerja::paginate(10);
        }

        return view('data/datapekerja',compact('data'));
    }

    public function tambahpegawai(){
        return view('data/tambahdata');
    }

    public function insertdata(Request $req){
        // dd($req->all());

        $this->validate($req,[
            'firstnama' => 'required|min:4|max:30',
            'lastnama' => 'required|min:4|max:20',
            'company_id' => 'required|min:1|max:2',
            'email' => 'required|unique:pekerjas|min:8',
            'nohp' => 'required|min:11|max:12',
        ]);

        $data = Pekerja::create($req->all());
        if($req->hasFile('foto')){
            $req->file('foto')->move('fotopekerja/', $req->file('foto')->getClientOriginalName());
            $data->foto = $req->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('pegawai')->with('sukses','Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        $data = Pekerja::find($id);
        // dd($data);
        return view('data/tampildata', compact('data'));
    }

    public function editdata(Request $req, $id){
        $data = Pekerja::find($id);
        $data->update($req->all());
        if($req->hasFile('foto')){
            $req->file('foto')->move('fotopekerja/', $req->file('foto')->getClientOriginalName());
            $data->foto = $req->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('sukses','Data Berhasil Di Edit');
    }

    public function delete($id){
        $data = Pekerja::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('sukses','Data Berhasil Di Hapus');
    }

    public function diri(Request $req){
        return view('profil/diri');
    }
}

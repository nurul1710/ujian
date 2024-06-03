<?php

namespace App\Http\Controllers;

use App\Models\baju;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class bajucontroller extends Controller
{
    //
    public function index(){
        return view('baju.index',["title" => "koleksi baju","data"=>baju::paginate(8)]);
       
    }

    public function cari(Request $request){
        $cari=$request->cari;
        $baju=baju::where('baju','LIKE','%'.$cari.'%')
                      ->paginate(8);
        return view('baju.index',['data'=>$baju])->with(["title"=>"cari Baju"]);
    }
    public function create(){
        return view('baju.create')->with(["title"=>"tambah data Baju"]);   
    }

    public function store(Request $request){
      $validasi=$request->validate([
        "nama_baju"=>"required",
        "size"=>"required",
        "harga_perhari"=>"required",
        //"quantity"=>"required",
        //"status"=>"required",
        "cover"=>"image|file|max:1024"
        ]);
        if ($request->file('cover')){
            $validasi['cover']=$request->file('cover')->store('img');
        }

        baju::create($validasi);
        return redirect()->route('baju.index');
    }

    public function edit($id){
        $baju=baju::find($id);
        return view('baju.edit')->with('baju',$baju)->with(["title"=>"tambah data Baju"]);
    }
    public function update(baju $baju,request $request){
        $validasi=$request->validate([
            "nama_baju"=>"required",
            "size"=>"required",
            "harga_perhari"=>"required",
            //"quantity"=>"required",
          //  "status"=>"required",
            "cover"=>"image|file|max:1024"
        ]);
        if ($request->file('cover')){
            $validasi['cover']=$request->file('cover')->store('img');
        }
        
        $baju->update($validasi);
        return redirect()->route('baju.index')->with(["title"=>"edit Baju"]);
    }

    public function destroy($id){
        baju::where('id',$id)->Delete();
        return redirect()->route(('baju.index'))->with('success', 'Baju berhasil dihapus');;
    }

}
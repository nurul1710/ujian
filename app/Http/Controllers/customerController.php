<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\customer;

class customerController extends Controller
{
    public function index(){
        return view('customer.tabel',[
            "title"=> "customer",
            "data"=> customer::all()
        ]);
        }
    public function create():View  
    {
        return view('customer.tambah')->with(["title"=>"Tambah Data Customer"]);
    } 

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            

        ]);

        customer::create($request->all());
        return redirect()->route('pelanggan.index')->with('success','Data Customer Berhasil Ditambahkan');

    }

    public function edit(customer $pelanggan):View
    {
        return view('customer.edit',compact('pelanggan'))->with(["title"=>"Ubah Data Customer"]);
    }

    public function update(Request $request,customer $pelanggan):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
           

    ]);
    $pelanggan->update($request->all());
    return redirect()->route('pelanggan.index')->with ('updated','Data Pelanggan Berhasil Diubah');
    }
public function show(customer $pelanggan):View
{
    return view('customer.tampil',compact('pelanggan'))->with(["title"=>"Data customer"]);
}
 } 
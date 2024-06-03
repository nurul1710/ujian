<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\baju;
use App\Models\sewa;

class sewaController extends Controller
{
    public function index()
    {
        $data = sewa::with(['baju','user'])->get();

        return view('sewa.tabel', [
            "title" => "sewa",
            "data" => $data
        ]);
    }

    public function create()
{
    
    $data = baju::all(); // Fetch the data of baju to be used in the form
    return view('sewa.create', [
        "title" => "Tambah Sewa Baju",
        "data" => $data
    ]);
}


    public function store(Request $request)
    {
        $adminId = Auth::id();
        $validasi = $request->validate([
            "name" => "required",
            "baju_id" => "required",
            "phone" => "required",
            "tanggal_peminjaman" => "required|date",
            "tanggal_pengembalian" => "required|date",
        ]);

        $validasi['user_id'] = $adminId;

        sewa::create($validasi);

        $baju = baju::find($request->baju_id);
        if ($baju) {
            $baju->status = 'sewa';
            $baju->save();
        }

        return redirect()->route('baju.index');
    }

    public function edit($id): View
    {
        $sewa = sewa::findOrFail($id);
        $data = baju::all();

        return view('sewa.edit', [
            'sewa' => $sewa,
            'title' => 'Ubah Data Pinjam',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'status' => 'required'
        ]);

        $sewa = sewa::findOrFail($id);
        $sewa->update($request->only('status'));

        $baju = baju::findOrFail($sewa->baju_id);
        $baju->status = $request->status;
        $baju->save();

        return redirect()->route('sewa.index')->with('updated', 'Data buku berhasil diubah');
    }
    public function show(sewa $sewa):View{
        return view('sewa.show',compact('sewa'))
                          ->with(["title"=>"data sewa"]);
    }
}


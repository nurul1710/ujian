<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            "title"=>"Data admin",
            "data"=> User::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email:rfc",
            "password"=>"required"
            
        ]);
        // dd($request->all());
        
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);
        

        User::create($request->all());
        return redirect()->route('admin.index')->with('success','Data User Berhasil Ditammbahkan');

    }
}

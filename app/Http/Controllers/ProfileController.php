<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::all();
        return view('welcome', compact('profiles'));
    }

    public function create()
    {
        //
    }

    public function update(Request $request, $id)
    {
        $namaFileBaru = null;
    
        if ($request->hasFile('foto')) {
            $ambil = $request->file('foto');
            $name = $ambil->getClientOriginalName();
            $namaFileBaru = uniqid() . '_' . $name;
            $ambil->move(public_path('image'), $namaFileBaru);
        }
    
        $updateData = [];
        
        if ($namaFileBaru) {
            $updateData['foto'] = $namaFileBaru;
        }
    
        DB::table('profiles')->where('id', $id)->update($updateData);
    
        return redirect('/profile')->with(['success' => 'Data Updated Successfully!']);
    }
    
    
    public function destroy($id)
    {
        $profile = Profile::find($id);
    
        if ($profile) {
            $gambarPath = public_path('image/' . $profile->foto);
    
            if ($profile->foto && file_exists($gambarPath)) {
                unlink($gambarPath); // Menghapus gambar dari folder
            }
    
            $profile->update(['foto' => null]); // Mengatur foto menjadi null tanpa menghapus data lainnya
    
            return redirect()->route('profile')->with(['success' => 'Foto berhasil dihapus!']);
        }
    
        return redirect()->route('profile')->with(['error' => 'Foto tidak ditemukan!']);
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required|max:50'
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        session()->flash('success', 'Data Mahasiswa berhasil ditambahkan!');

        return redirect('/');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required|max:50'
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        session()->flash('success', 'Data Mahasiswa berhasil diubah!');

        return redirect('/');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        session()->flash('success', 'Data Mahasiswa berhasil dihapus!');

        return redirect('/');
    }
}

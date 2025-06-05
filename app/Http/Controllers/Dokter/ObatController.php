<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('dokter.obat.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        // Debugging: Log data yang diterima
        \Log::info('Data yang diterima di store:', $request->all());

        // Simpan data
        $obat = Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        if ($obat) {
            return redirect()->route('dokter.obat.index')->with('status', 'obat-created');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan obat.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        // Debugging: Log data yang diterima
        \Log::info('Data yang diterima di update:', $request->all());

        // Update data
        $obat = Obat::findOrFail($id);
        if ($obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ])) {
            return redirect()->route('dokter.obat.index')->with('status', 'obat-updated');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate obat.');
        }
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        if ($obat->delete()) {
            return redirect()->route('dokter.obat.index')->with('status', 'obat-deleted');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus obat.');
        }
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', compact('obat'));
    }
}
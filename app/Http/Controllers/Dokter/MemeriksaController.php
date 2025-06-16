<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use App\Models\Obat;

class MemeriksaController extends Controller
{
    // Tampilkan daftar janji periksa untuk dokter yang login
    public function index()
    {
        $janjiPeriksas = JanjiPeriksa::with(['pasien', 'periksa'])
            ->whereHas('jadwalPeriksa', function ($query) {
                $query->where('id_dokter', auth()->id());
            })
            ->orderBy('no_antrian')
            ->get();

        return view('dokter.memeriksa.index', compact('janjiPeriksas'));
    }

    // Form pemeriksaan untuk pasien yang belum diperiksa
    public function periksa($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['pasien', 'jadwalPeriksa'])->findOrFail($id);

        // Cek apakah dokter yang login memiliki akses ke janji ini
        if ($janjiPeriksa->jadwalPeriksa->id_dokter !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $obats = Obat::all(); // Pakai nama variabel jamak

        return view('dokter.memeriksa.periksa', compact('janjiPeriksa', 'obats'));
    }

    // Form edit hasil periksa (jika sudah diperiksa)
    public function edit($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['pasien', 'periksa', 'jadwalPeriksa'])->findOrFail($id);

        if ($janjiPeriksa->jadwalPeriksa->id_dokter !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $obats = Obat::all(); // Pastikan tersedia untuk form edit juga

        return view('dokter.memeriksa.edit', compact('janjiPeriksa', 'obats'));
    }

    // Simpan hasil pemeriksaan
  public function store(Request $request, $id)
{
    $janjiPeriksa = JanjiPeriksa::with('periksa')->findOrFail($id);

    // Cek apakah dokter yang login memiliki akses ke janji ini
    if ($janjiPeriksa->jadwalPeriksa->id_dokter !== auth()->id()) {
        abort(403, 'Anda tidak memiliki akses ke data ini.');
    }

    // Buat data periksa
    $periksa = $janjiPeriksa->periksa()->create([
        'tgl_periksa'    => $request->tgl_periksa,
        'catatan'        => $request->catatan,
        'biaya_periksa'  => $request->biaya_periksa,
    ]);

    // Simpan detail periksa (obat yang diberikan)
    if ($request->has('obat')) {
        foreach ($request->obat as $id_obat) {
            \App\Models\DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat'    => $id_obat,
            ]);
        }
    }

    return redirect()->route('dokter.memeriksa.index')->with('success', 'Data pemeriksaan berhasil disimpan.');
}


}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;


class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservasi = Reservasi::paginate(10);
        return view('reservasi/index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_meja' => 'required|integer',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required',
            'status' => 'required|in:terjadwal,hadir,dibatalkan',
        ]);
        Reservasi::create($request->all());
        return redirect()->route('reservasi.index')->with('success','Data reservasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.edit', compact('reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_meja' => 'required|integer',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required',
            'status' => 'required|in:terjadwal,hadir,dibatalkan',
        ]
        );
        $reservasi = Reservasi::findOrFail($id);
        $reservasi -> update($request-> all());
        return redirect()->route('reservasi.index')->with('success','Data reservasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success','Data reservasi berhasil dihapus');
    }
    public function trash()
    {
        $reservasi = Reservasi::onlyTrashed()->paginate(10); // hanya ambil data yang dihapus
        return view('reservasi.trash', compact('reservasi'));
    }

    public function restore($id)
    {
        $reservasis = Reservasi::onlyTrashed()->findOrFail($id);
        $reservasis->restore();
        return redirect()->route('reservasi.trash')->with('success', 'Data berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $reservasis = Reservasi::onlyTrashed()->findOrFail($id);
        $reservasis->forceDelete();
        return redirect()->route('reservasi.trash')->with('success', 'Data berhasil dihapus permanen.');
    }

}

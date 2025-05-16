<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minumans = Minuman::all();
        return view('minuman.index', compact('minumans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('minuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $minuman = new Minuman();
        $minuman->nama = $request->nama;
        $minuman->stok = $request->stok;
        $minuman->deskripsi = $request->deskripsi;
        $minuman->harga = $request->harga;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public/foto_minuman', $fileName);
            $minuman->foto = $fileName;
        }

        $minuman->save();

        return redirect()->route('minuman.index');
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
        $minuman = Minuman::findOrFail($id);
        return view('minuman.edit', compact('minuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $minuman = Minuman::findOrFail($id);
        $minuman->nama = $request->nama;
        $minuman->stok = $request->stok;
        $minuman->deskripsi = $request->deskripsi;
        $minuman->harga = $request->harga;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($minuman->foto) {
                Storage::delete('public/foto_minuman/' . $minuman->foto);
            }
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public/foto_minuman', $fileName);
            $minuman->foto = $fileName;
        }

        $minuman->save();

        return redirect()->route('minuman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $minuman = Minuman::findOrFail($id);
        // Hapus foto jika ada
        if ($minuman->foto) {
            Storage::delete('public/foto_minuman/' . $minuman->foto);
        }
        $minuman->delete();
        return redirect()->route('minuman.index');
    }
}

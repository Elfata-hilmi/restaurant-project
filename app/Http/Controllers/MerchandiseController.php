<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $merchandises = Merchandise::all();
        return view('merchandise.index', compact('merchandises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('merchandise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Merchandise::create($request->all());
        return redirect()->route('merchandise.index')->with('success', 'Berhasil menambahkan merchandise.');
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
        $merchandise = Merchandise::findOrFail($id);
        return view('merchandise.edit', compact('merchandise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);
        
        $merchandise = Merchandise::findOrFail($id);

        $merchandise->update($request->all());
        return redirect()->route('merchandise.index')->with('success', 'Berhasil mengupdate merchandise.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $merchandise = Merchandise::findOrFail($id);
        
        $merchandise->delete();
        return redirect()->route('merchandise.index')->with('success', 'Berhasil menghapus merchandise.');
    }
}

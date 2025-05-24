<?php

// app/Http/Controllers/MinumanController.php
namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MinumanController extends Controller
{
    public function index() {
        $minumans = Minuman::all();
        return view('minuman.index', compact('minumans'));
    }

    public function create() {
        return view('minuman.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama', 'deskripsi', 'harga']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('image'), $filename);
            $data['foto'] = $filename;
        }

        Minuman::create($data);

        return redirect()->route('minuman.index');
    }

    public function edit($id) {
        $minuman = Minuman::findOrFail($id);
        return view('minuman.edit', compact('minuman'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
        ]);

        $minuman = Minuman::findOrFail($id);
        $data = $request->only(['nama', 'deskripsi', 'harga']);

        if ($request->hasFile('foto')) {
            // Delete old file
            if ($minuman->foto && file_exists(public_path('image/' . $minuman->foto))) {
                File::delete(public_path('image/' . $minuman->foto));
            }

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('image'), $filename);
            $data['foto'] = $filename;
        }

        $minuman->update($data);

        return redirect()->route('minuman.index');
    }

    public function destroy($id) {
        $minuman = Minuman::findOrFail($id);

        if ($minuman->foto && file_exists(public_path('image/' . $minuman->foto))) {
            File::delete(public_path('image/' . $minuman->foto));
        }

        $minuman->delete();

        return redirect()->route('minuman.index');
    }
}

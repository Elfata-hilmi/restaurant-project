<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::with('user')->latest()->get();
        return view('testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimoni.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'isi' => $request->isi,
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dikirim.');
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
        $testimoni = Testimoni::findOrFail($id);

        if (Auth::id() !== $testimoni->user_id) {
            abort(403);
        }

        return view('testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if (Auth::id() !== $testimoni->user_id) {
            abort(403);
        }

        $request->validate([
            'isi' => 'required|string',
        ]);

        $testimoni->update([
            'isi' => $request->isi,
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(403, 'Tidak diizinkan menghapus testimoni.');
    }
}

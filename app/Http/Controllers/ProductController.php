<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image'), $filename);
        $data['photo'] = $filename;
    }

    Product::create($data);

    return redirect()->route('product.index')->with('success', 'Makanan berhasil ditambahkan.');
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
        $product = Product::findOrFail($id); // Ambil data produk dari DB
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('photo')) {
        // Optional: hapus file lama
        if ($product->photo && file_exists(public_path('image/' . $product->photo))) {
            unlink(public_path('image/' . $product->photo));
        }

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('image'), $filename);
        $data['photo'] = $filename;
    }

    $product->update($data);

    return redirect()->route('product.index')->with('success', 'Makanan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id); // Tambahkan ini
        $product->delete();
    
        return redirect()->route('product.index')->with('success', 'Makanan berhasil dihapus.');
    }
}

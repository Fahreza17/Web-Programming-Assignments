<?php

namespace App\Http\Controllers;

use App\Models\SkincareProduct;
use Illuminate\Http\Request;

class SkincareProductController extends Controller
{
    public function index() //Mengambil semua produk skincare dari database
    {
        $skincareProducts = SkincareProduct::all();
        return view('index', compact('skincareProducts'));
    }

    public function create() //Menampilkan formulir untuk membuat produk skincare baru.
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $this->validateProductData($request); //untuk memastikan bahwa data yang masuk dari request valid berdasarkan aturan validas

        SkincareProduct::create($data); //membuat instance baru dari model SkincareProduct dan mengisinya dengan data yang telah divalidasi. Kemudian, menyimpan instance baru tersebut ke dalam database.

        return redirect()->route('skincare-products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(SkincareProduct $skincareProduct) //Menampilkan detail dari produk skincare tertentu.
    {
        return view('show', compact('skincareProduct'));
    }

    public function edit(SkincareProduct $skincareProduct) //Menampilkan formulir untuk mengedit produk skincare tertentu.
    {
        return view('edit', compact('skincareProduct'));
    }

    public function update(Request $request, SkincareProduct $skincareProduct)
    {
        $data = $this->validateProductData($request);

        $skincareProduct->update($data);

        return redirect()->route('skincare-products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(SkincareProduct $skincareProduct) //Menghapus produk skincare tertentu dari database
    {
        $skincareProduct->delete();

        return redirect()->route('skincare-products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validateProductData(Request $request) //Menangani pengiriman formulir untuk memperbarui produk skincare yang sudah ada di database
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
    }
}
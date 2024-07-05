<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return response()->json([
            'success' => true,
            'message' => "List Data Produk",
            'data' => $produk
        ]);
    }
     // Method untuk menambah produk baru
     public function store(ProdukRequest $request)
     {
         $produk = Produk::create($request->validated());
         return response()->json($produk, 201);
     }

     // Method untuk mengupdate produk
     public function update(ProdukRequest $request, $id)
     {
         $produk = Produk::findOrFail($id);
         $produk->update($request->validated());
         return response()->json($produk);
     }

         // Method untuk menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return response()->json(['message' => 'Produk deleted successfully']);
    }
 }


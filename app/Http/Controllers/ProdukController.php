<?php


namespace App\Http\Controllers;


use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function showAllProduk()
    {
        return response()->json(Produk::all());
    }

    public function showOneProduk($id)
    {
        return response()->json(Produk::find($id));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'stok' => 'required',
            'modal' => 'required'
        ]);

        $produk = Produk::create($request->all());
        return response()->json($produk, 201);
    }

    public function update($id, Request $request)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return response()->json($produk, 200);
    }

    public function delete($id)
    {
        Produk::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}

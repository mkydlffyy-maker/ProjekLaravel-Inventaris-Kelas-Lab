<?php
namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        //
        $inventaris = Inventaris::all();

        return view('inventaris.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        //
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_barang' => 'required|unique:inventaris,kode_barang',
            'nama_barang' => 'required',
            'kondisi' => 'required|in:Baik,Rusak',
            'jumlah' => 'required|integer|min:1'
        ], ['kode_barang.unique' => 'Kode barang sudah terdaftar. Silakan gunakan kode lain.']);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil ditambahkan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil dihapus!');
    }
}


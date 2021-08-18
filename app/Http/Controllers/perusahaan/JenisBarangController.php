<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perusahaan.jenisBarang');
    }

    public function api(){
        $barang = JenisBarang::all();
        return DataTables::of($barang)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route( 'Perusahaan.Jenis_Barang.edit', $p->id) . "' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            
            
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required'
        ]);

        $jenis_barang = new JenisBarang();
        $jenis_barang-> nama_barang = $request->nama_barang;
        $jenis_barang-> harga_beli = $request->harga_beli;
        $jenis_barang-> harga_jual = $request->harga_jual;
        $jenis_barang->save();

        return response()->json([
            'message' => 'Data Berhasil di Tambahkan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = JenisBarang::find($id);

        return view('perusahaan.editJenis_barang',compact('barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = JenisBarang::find($id);

        $request->validate([
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required'
        ]);

        $nama_barang = $request->nama_barang;
        $harga_beli = $request->harga_beli;
        $harga_jual = $request->harga_jual;

        $barang->update([
            'nama_barang' => $nama_barang,
            'harga_beli'  => $harga_beli,
            'harga_jual'  => $harga_jual
        ]);

        return redirect('Perusahaan/Jenis_Barang')->with('status', 'data berhasil di Rubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisBarang::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}

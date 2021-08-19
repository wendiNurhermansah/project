<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis_pesanan;
use Yajra\DataTables\DataTables;
use App\Models\JenisBarang;
use App\Models\Pesanan;
use PhpParser\Node\Stmt\Foreach_;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = JenisBarang::all();
        return view('perusahaan.pesanan', compact('barang'));
    }

    public function api(){
        $pesanan = Jenis_pesanan::all();
        return DataTables::of($pesanan)
        

            ->addColumn('action', function ($p) {
                return "
                    
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('tanggal', function($p){
                return $p->pesanan->tanggal;
            })

            ->editColumn('id_pesanan', function($p){
                return $p->pesanan->nama_pemesan;
            })

            ->editColumn('jenis_pesanan', function($p){
                return $p->barang->nama_barang;
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
                'nama_pemesan' => 'required',
                'tanggal' => 'required',
                'keterangan' => 'required',
                'harga' => 'required',
                'jumlah' => 'required',
                'total' => 'required',
                'alamat' => 'required'

            ]);

        $pesanan = new Pesanan();
        $pesanan-> nama_pemesan = $request->nama_pemesan;
        $pesanan-> tanggal = $request->tanggal;
        $pesanan-> alamat = $request->alamat;
        $pesanan->save();

        foreach($request->jenis_pesanan as $key => $jenis_pesanan){
        $jenis_pesanan = new Jenis_pesanan();
        
        $jenis_pesanan-> id_pesanan = $pesanan->id;
        $jenis_pesanan-> jenis_pesanan = $request->jenis_pesanan[$key];
        $jenis_pesanan-> harga = $request->harga[$key];
        $jenis_pesanan-> jumlah = $request->jumlah[$key];
        $jenis_pesanan-> total = $request->total[$key];
        $jenis_pesanan-> keterangan = $request->keterangan[$key];
        $jenis_pesanan->save();
        }
        return response()->json([
            'message' => 'Data Berhasil di tambahkan.'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis_pesanan::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }

    public function dataBarang($id){
        // dd($id);
        $barang = JenisBarang::find($id);
        // dd($barang);
        
        return $barang;
    }
}

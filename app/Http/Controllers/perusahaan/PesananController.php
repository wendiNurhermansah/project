<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis_pesanan;
use Yajra\DataTables\DataTables;
use App\Models\JenisBarang;
use App\Models\Pesanan;
use Carbon\Carbon;



class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
       
        $date = Carbon::now();
        $days = $date->day;
        $month = $date->month;
        $years = $date->year;
       
        // dd($no+ 1);

        $transaksi = Pesanan::whereRaw('extract(month from tanggal) = ?', [$month])->count();
        // dd($transaksi);
        

        if ($transaksi != 0){
           $no = $transaksi+1;
        }else{
           $no = $transaksi;
        }

        $kode = $days.$month.$years.$no;
        
        // dd($kode);
       
        $barang = JenisBarang::all();
        return view('perusahaan.pesanan', compact('barang','kode'));
    }

    public function kode(){
        $tanggal = date('dmy');
        $bulan = 1;
        // dd($tanggal);
        $kode = $tanggal.$bulan;
        dd($kode);
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
        $jp = $request->jenis_pesanan;
        // dd($jp);
        // $jb = JenisBarang::findOrFail($jp);
        // dd($jb);
    
        $request->validate([
                'nama_pemesan' => 'required',
                'tanggal' => 'required',
                'keterangan' => 'required',
                'harga' => 'required',
                'jumlah' => 'required',
                'total' => 'required',
                'no_transaksi' => 'required',
                'total_jumlah' => 'required',
                'total_harga' => 'required'
               

            ]);

        $pesanan = new Pesanan();
        $pesanan-> nama_pemesan = $request->nama_pemesan;
        $pesanan-> tanggal = $request->tanggal;
        $pesanan-> no_transaksi = $request->no_transaksi;
        $pesanan-> total_jumlah = $request->total_jumlah;
        $pesanan-> total_harga = $request->total_harga;
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

        $jb = JenisBarang::findOrFail($jenis_pesanan->jenis_pesanan);
        $jb->update(['status' => 1]);
        // dd($jenis_pesanan);
           
        
        }

       
        // $a = 1;
        // $jb->update([
        //     'status' => $a,
        // ]);
        

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

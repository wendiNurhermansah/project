<?php

namespace App\Http\Controllers\perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Costumer;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::select('id', 'n_provinsi')->get();
        return view('perusahaan.custumer',compact('provinsi'));
    }

    public function api(){
        $customer = Costumer::all();
        return DataTables::of($customer)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route( 'Perusahaan.customer.edit', $p->id) . "' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            
            ->editColumn('alamat', function ($p) {
               
                   
                    $cek = ' ';
                    $cek .= $p->alamat.' ,' .$p->kel->n_kelurahan.' ,'.$p->kec->n_kecamatan.' ,'.$p->kab->n_kabupaten.' ,'.$p->prov->n_provinsi;
                
                    return $cek;
                
                
               
            })   
            ->addIndexColumn()
            ->rawColumns(['action', 'alamat'])
            ->toJson();
    }

    public function kabupatenByProvinsi($provinsi_id)
    {
        return Kabupaten::select('id', 'n_kabupaten')->where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatanByKabupaten($kabupaten_id)
    {
        return Kecamatan::select('id', 'n_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahanByKecamatan($kecamatan_id)
    {
        return Kelurahan::select('id', 'n_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();
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
            'nama' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'no_telepon' => 'required',
            'no_pic' => 'required'
        ]);

        $customer = new Costumer();
        $customer -> nama = $request->nama;
        $customer -> alamat = $request->alamat;
        $customer -> provinsi = $request->provinsi;
        $customer -> kabupaten = $request->kabupaten;
        $customer -> kecamatan = $request->kecamatan;
        $customer -> kelurahan = $request->kelurahan;
        $customer -> no_telepon = $request->no_telepon;
        $customer -> no_pic = $request->no_pic;
        $customer->save();
        

        return response()->json([
            'message' => 'data berhasil di tambahkan'
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
        $customer = Costumer::find($id);
         $provinsi = Provinsi::select('id', 'n_provinsi')->get();
        // $kabupaten = kabupaten::select('id', 'n_kabupaten')->get();
        // $kecamatan = kecamatan::select('id', 'n_kecamatan')->get();
        // $kelurahan = kelurahan::select('id', 'n_kelurahan')->get();

        $prov = $customer->provinsi;
        $kab = $customer->kabupaten;
        $kec= $customer->kecamatan;

        $kabupaten = Kabupaten::where('provinsi_id', $prov)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', $kab)->get();
        $kelurahan = Kelurahan::where('kecamatan_id', $kec)->get();
       
        return view ('perusahaan.editCustomer', compact('provinsi','customer','kabupaten','kecamatan','kelurahan',));
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
        $customer = Costumer::find($id);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'no_telepon' => 'required',
            'no_pic' => 'required'
        ]);

        $nama = $request->nama;
        $alamat = $request->alamat;
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;
        $no_telepon = $request->no_telepon;
        $no_pic = $request->no_pic;

        $customer->update([
            'nama' => $nama,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'no_telepon' => $no_telepon,
            'no_pic' => $no_pic,
        ]);

        return redirect('Perusahaan/customer')->with('status', 'data berhasil di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Costumer::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}

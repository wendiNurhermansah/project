@extends('layouts.main')
@section('title', 'Edit pesanan')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>                       
                        <i class="icon icon-users mr-2"></i>
                        Edit Pesanan                  
                    </h4>
                </div>
            </div>
        </div>
    </header>
        <div class="container-fluid relative animatedParent animateOnce">
            <div class="container-fluid relative animatedParent animateOnce">
                <div class="tab-content my-3" id="pills-tabContent">
                    <div class="tab-pane animated fadeInUpShort show active"  id="semua-data" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                    <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                            {{ method_field('POST') }}
                                            <input type="hidden" id="id" name="id"/>
                                            <h4 id="formTitle">Edit Pesanan</h4><hr>
                                            <div class="form-row form-inline">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="row col-md-6">
                                                            <label for="no_transaksi" class="s-12 col-md-3 mt-3">No Transaksi</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="no_transaksi" id="no_transaksi" class="form-control r-0 light s-12 mt-2 " value="{{$pesanan->no_transaksi}}" autocomplete="off" required readonly/>
                                                            </div>
                                                                            
                                                        </div>
                                                        <div class="row col-md-6">
                                                            <label for="tanggal" class="s-12 col-md-3 mt-3">Tanggal</label>
                                                            <div class="col-sm-6">
                                                                <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12 mt-2 " value="{{$pesanan->tanggal}}" autocomplete="off" required/>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="row col-md-6">
                                                            <label for="nama_pemesan" class="s-12 col-md-3 mt-3">Nama Pemesan</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control r-0 light s-12 mt-2 " value="{{$pesanan->nama_pemesan}}" autocomplete="off" required/>
                                                            </div>
                                                                            
                                                        </div>
                                                        <div class="row col-md-6">

                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="row col-md-6">
                                                            <label for="nama_perusahaan" class="s-12 col-md-3 mt-3">Jenis Pesanan</label>
                                                            <div class="col-sm-6">
                                                                
                                                            </div>
                                                                            
                                                        </div>
                                                        <div class="row col-md-6">
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-3">
                                                        
                                                        <div class="col-md-12">
                                                            <table id="dinamic" class="table table-striped table-bordered" style="width:50%">
                                                                <thead class="text-center">
                                                                    <th class="text-center"><i class="icon icon-plus text-success" id="tambah"></i></th>
                                                                
                                                                    <th>JENIS PESANAN</th>
                                                                    <th>HARGA</th>
                                                                    <th>JUMLAH</th>
                                                                    <th>TOTAL</th>
                                                                    <th>KETERANGAN</th>
                                                                    
                                                                </thead>
                                                                <tbody id="tbody">
                                                                @php($a=1)
                                                                @foreach ($jenis_pesanan as $i)
                                                                <tr id="id_{{$i->id}}"> 
                                                                    <td class="text-center" ></td>
                                                                
                                                                    <td>
                                                                        <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan{{$a}}" onchange="option(this, {{$a}})" autocomplete="off">
                                                                            <option value="">Pilih Pesanan</option>
                                                                            @foreach ($barang as $item)
                                                                                <option value="{{$item->id}}" id="jenisPesanan{{$a}}" {{ $item->id == $i->jenis_pesanan ? 'selected' : '' }}>{{$item->nama_barang}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td >
                                                                        <input class="text-center" type="text" name="harga[]" id="harga{{$a}}" autocomplete="off" value="{{$i->harga}}"  readonly/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="text-center" type="text" name="jumlah[]" id="jumlah{{$a}}"  onkeyup="onjumlah({{$a}})" value="{{$i->jumlah}}" autocomplete="off" />
                                                                    </td>
                                                                    <td>
                                                                        <input class="text-center" type="text" name="total[]" id="total{{$a}}" value="{{$i->total}}" autocomplete="off" readonly/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="text-center" type="text" name="keterangan[]"  id="keterangan{{$a}}" value="{{$i->keterangan}}" autocomplete="off" />    
                                                                    </td>
                                                                    @php($a++)
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                    <td colspan="3" class="text-center">Total</td>
                                                                    <td>
                                                                        <input class="text-center" type="text" name="total_jumlah" id="total_jumlah" value="{{$pesanan->total_jumlah}}" autocomplete="off" readonly/>
                                                                    </td>
                                                                    <td>
                                                                        <input class="text-center" type="text" name="total_harga" id="total_harga" value="{{$pesanan->total_harga}}" autocomplete="off" readonly/>      
                                                                    </td>
                                                                    <td>
                                                                    
                                                                    </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>    
                                                    </div>
                                                  <div class="mt-4" style="margin-left: 17%">
                                                        <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                        <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
//   var i = 0;
  var i = $('#dinamic > tbody > tr').length;
//   console.log(i);
        $(document).ready(function(){
            // GET EDIT
            // edit();

       
        
        $('#tambah').click(function(){
            i++;
           
            $('#dinamic').append(`<tr id="trTable`+i+`">
                                                                <td class="text-center" ><i class='icon icon-remove' id="hapus`+i+`" onclick='hapusTable(`+i+`)'></i></td>
                                                               
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan_"1 onchange="option(this, `+i+`)" autocomplete="off">
                                                                        <option value="">Pilih Pesanan</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}" id="jenis_pesanan_`+i+`">{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="harga[]" id="harga`+i+`" autocomplete="off" readonly />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="jumlah[]" id="jumlah`+i+`" onkeyup="onjumlah(`+i+`)"  autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="total[]" id="total`+i+`" autocomplete="off" readonly />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="keterangan[]" id="keterangan`+i+`" autocomplete="off" />    
                                                                </td>
                                                                
                                                            </tr>`);
        });



        // // Eech Detail pesanana
        // $.each({!! json_encode($jenis_pesanan) !!}, function(index, value){
        //      console.log(value);
        //      i++;
                
               

        //         console.log(value.jenis_pesanan);
        //         var id_jenis_pesanan = value.jenis_pesanan;
        //         var ops = '';
        //         @foreach ($barang as $item)
        //             sel = '';
        //             if(id_jenis_pesanan == {{$item->id}}) sel = 'selected';
        //             ops += `<option value="{{$item->id}}" ` + sel + `>{{$item->nama_barang}}</option>`;
        //         @endforeach
        //         $('#dinamic').append(`
        //             <tr id="trTable`+i+`">
        //                 <td class="text-center" ><i class='icon icon-remove' id="hapus`+i+`" onclick='hapusTable(`+i+`)'></i></td>
                        
        //                 <td>
        //                     <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan3" onchange="option2(this, `+i+`)" autocomplete="off">
        //                         <option value="">Pilih Pesanan</option>
        //                         `+ops+`
        //                     </select>
        //                 </td>
        //                 <td>
        //                     <input class="text-center" type="text" name="harga[]" id="harga_4`+i+`" value=`+value.harga+` autocomplete="off" readonly />
        //                 </td>
        //                 <td>
        //                     <input class="text-center" type="text" name="jumlah[]" id="jumlah_4`+i+`" value=`+value.jumlah+` onkeyup="onjumlah3(`+i+`)"  autocomplete="off" />
        //                 </td>
        //                 <td>
        //                     <input class="text-center" type="text" name="total[]" id="total_4`+i+`" value=`+value.total+` autocomplete="off" readonly/>
        //                 </td>
        //                 <td>
        //                     <input class="text-center" type="text" name="keterangan[]" id="keterangan_4`+i+`" value=`+value.keterangan+` autocomplete="off" />    
        //                 </td>
                        
        //             </tr>`);
        //     }); 

        
    });
    var a = 0;
    

    function option(option, i){
        // a++;
        var selected = $(option).find(':selected');
        var id = $(selected).val();

        $.get("{{ route('Perusahaan.Pesanan.dataBarang', ':id') }}".replace(':id', id), function(data){
            // console.log(data);
            $("#harga"+i).val(data.harga_jual);
        });
    }

    
    // function onjumlah(){
    //     // a++;
    //     // console.log('wendi');
    //     var hrg = $('#harga'+i).val();
    //     console.log(hrg);
    //     var jlh = $('#jumlah'+i).val();
    //     console.log(jlh);
    //     var ttl = hrg*jlh;
    //     console.log(ttl);
    //     $('#total'+i).val(ttl);

    // }

    function onjumlah(i){
         //jumlah kesamping 
        // console.log('wendi');
        var hrg = $('#harga'+i).val();
        // console.log(hrg);
        var jlh = $('#jumlah'+i).val();
        // console.log(jlh);
        var ttl = hrg*jlh;
        // console.log(ttl);
        $('#total'+i).val(ttl);

        //jumlah total
        var wen = $('#dinamic > tbody > tr').length;
        // console.log(wen);
        var sum = 0;
        //   console.log(total);
        for (index = 1; index <= wen; index++) {
            // console.log(index)
            var sib = $("#jumlah"+index).val();
            var   sum = sum+parseInt(sib);
            $('#total_jumlah').val(sum);
            
           
        }

        //jumlah harga
        var wen1 = $('#dinamic > tbody > tr').length;
        // console.log(wen);
        var sum1 = 0;
        //   console.log(total);
        for (index = 1; index <= wen1; index++) {
            // console.log(index)
            var sib1 = $("#total"+index).val();
            var   sum1 = sum1+parseInt(sib1);
            $('#total_harga').val(sum1);
            
           
        }
    }




    // function hapusTable(i){
        
    //     //total_jumlah
    //     $("#trTable"+i).remove();
    //     var row = $("#tbody > tr").length;
    //     console.log(row);
    //     total1 =0;
    //     for (let index = 1; index <= row; index++) {
    //         var sub = $("#jumlah_"+index).val();
    //         console.log(sub);
    //         var total1 = parseInt(total1) + parseInt(sub);
    //         $('#total_jumlah').val(total1);
           
    //     }

    //     //jumlah_harga

    //     var raw = $("#tbody > tr").length;
    //     console.log(raw);
    //     total2 =0;
    //     for (let index = 1; index <= raw; index++) {
    //         var sub2 = $("#total_"+index).val();
    //         console.log(sub2);
    //         var total2 = parseInt(total2) + parseInt(sub2);
    //         $('#total_harga').val(total2);
           
    //     }
       
    // }

    // function option2(option, i){
    //     // i++;
    //     var selected = $(option).find(':selected');
    //     var id = $(selected).val();

    //     $.get("{{ route('Perusahaan.Pesanan.dataBarang', ':id') }}".replace(':id', id), function(data){
    //         // console.log(data);
    //         $("#harga_"+i).val(data.harga_jual);
    //     });
    // }


    // function onjumlah2(i){
    //     console.log('onjumlah2jalan')
    //     var jumlah = $("#jumlah_"+i).val();
    //     var jumlah2 = 0;
    //     // console.log(jumlah);
    //     var harga = $("#harga_"+i).val();
    //     // console.log(harga);
    //     var total = jumlah * harga ;

    //     $("#total_"+i).val(total);

    //     //total_jumlah

    //     var row = $("#tbody > tr").length;
    //     console.log(row);
    //     total1 =0;
    //     for (let index = 1; index <= row; index++) {
    //         var sub = $("#jumlah_"+index).val();
    //         console.log(sub);
    //         var total1 = parseInt(total1) + parseInt(sub);
    //         $('#total_jumlah').val(total1);
           
    //     }

    //     //jumlah_harga

    //     var raw = $("#tbody > tr").length;
    //     console.log(raw);
    //     total2 =0;
    //     for (let index = 1; index <= 3; index++) {
    //         var sub2 =+ $("#total_"+index).val();
    //         var sub3 = $("#total_4"+index).val();
    //         var harga2 = parseInt(sub3);
    //         // console.log(harga2);
    //         var total2 = parseInt(sub3);
            
    //         $('#total_harga').val(total2);
           
    //     }
       
        
    // }

    // function onjumlah3(i){
    //     console.log('onjumlah3jalan')
    //     var jm = $("#jumlah_4"+i).val();
    //     var jumlah2 = 0;
    //     // console.log(jumlah);
    //     var hr = $("#harga_4"+i).val();
    //     // console.log(harga);
    //     var tl = jm*hr ;

    //     $("#total_4"+i).val(tl);

    //      //total_jumlah
    //         var raw3 = $("#tbody > tr").length;
    //         console.log(raw3);
    //         total3 =0;
    //     for (let index = 1; index <= 2; index++) {
    //         var sub3 = $("#total_4"+index).val();
    //         console.log(sub3);
    //         var total3 = parseInt(total3) + parseInt(sub3);
    //         $('#total_harga').val(total3);
           
    //     }
         
       
    // }

   

 </script>
 @endsection
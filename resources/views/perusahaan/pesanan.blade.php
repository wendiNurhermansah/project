@extends('layouts.main')
@section('title', 'Pesanan')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list2 mr-2"></i>
                        List Pesanan
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Tambah Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <div class="card no-b">
                            <div class="card-body">
                                
                                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th width="30">No</th>
                                            <th>NO TRANSAKSI</th>
                                            <th>NAMA PESANAN</th>
                                            <th>JUMLAH</th>
                                            <th>TOTAL</th> 
                                                                                   
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tambah-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert"></div>
                        
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Tambah Pesanan</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="row col-md-6">
                                                    <label for="no_transaksi" class="s-12 col-md-3 mt-3">No Transaksi</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="no_transaksi" id="no_transaksi" class="form-control r-0 light s-12 mt-2 " value="{{$kode}}" autocomplete="off" required/>
                                                    </div>
                                                                      
                                                </div>
                                                <div class="row col-md-6">
                                                    <label for="tanggal" class="s-12 col-md-3 mt-3">Tanggal</label>
                                                    <div class="col-sm-6">
                                                        <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12 mt-2 " autocomplete="off" required/>
                                             
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row col-md-6">
                                                    <label for="nama_pemesan" class="s-12 col-md-3 mt-3">Nama Pemesan</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control r-0 light s-12 mt-2 " autocomplete="off" required/>
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
                                                           
                                                            <!-- <tr>
                                                                <td class="text-center" ><i class="icon icon-plus text-success" id="tambah"></i></td>
                                                               
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan" onchange="option(this)" autocomplete="off">
                                                                        <option value="">Pilih Pesanan</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}" id="jenisPesanan" >{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td >
                                                                    <input class="text-center" type="text" name="harga[]" id="harga" autocomplete="off"  readonly/>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="jumlah[]" id="jumlah"  onkeyup="onjumlah()" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="total[]" id="total" autocomplete="off" readonly/>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="keterangan[]" id="keterangan" autocomplete="off" />    
                                                                </td>
                                                                
                                                            </tr> -->
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <td colspan="3" class="text-center">Total</td>
                                                            <td>
                                                                <input class="text-center" type="text" name="total_jumlah" id="total_jumlah" autocomplete="off" readonly/>
                                                            </td>
                                                            <td>
                                                                <input class="text-center" type="text" name="total_harga" id="total_harga" autocomplete="off" readonly/>      
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
@endsection
@section('script')
 <script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route('Perusahaan.Pesanan.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'no_transaksi', name: 'no_transaksi'},
            {data: 'nama_pemesan', name: 'nama_pemesan'},
            {data: 'total_jumlah', name: 'total_jumlah', render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'total_harga', name: 'total_harga', render: $.fn.dataTable.render.number(',', '.', 0, '')},
            
        ]
    });

   

    $(document).ready(function(){
        var i = 0;
        var no = 1;
        $('#tambah').click(function(){
            i++;
            no++;
            $('#dinamic').append(`<tr id="trTable`+i+`">
                                                                <td class="text-center" ><i class='icon icon-remove' id="hapus`+i+`" onclick='hapusTable(`+i+`)'></i></td>
                                                               
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan" onchange="option2(this, `+i+`)" autocomplete="off">
                                                                        <option value="">Pilih Pesanan</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="harga[]" id="harga_`+i+`" autocomplete="off" readonly />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="jumlah[]" id="jumlah_`+i+`" onkeyup="onjumlah2(`+i+`)"  autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="total[]" id="total_`+i+`" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="keterangan[]" id="keterangan`+i+`" autocomplete="off" />    
                                                                </td>
                                                                
                                                            </tr>`);
        });

        
    });

    // rupiah
    // const formatRupiah = (money) => {
    //     return new Intl.NumberFormat('id-ID',
    //     { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }
    //     ).format(money);
    // }

    function hapusTable(i){
        
        //total_jumlah
        $("#trTable"+i).remove();
        var row = $("#tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#jumlah_"+index).val();
            console.log(sub);
            var total1 = parseInt(total1) + parseInt(sub);
            $('#total_jumlah').val(total1);
           
        }

        //jumlah_harga

        var raw = $("#tbody > tr").length;
        console.log(raw);
        total2 =0;
        for (let index = 1; index <= raw; index++) {
            var sub2 = $("#total_"+index).val();
            console.log(sub2);
            var total2 = parseInt(total2) + parseInt(sub2);
            $('#total_harga').val(total2);
           
        }
       
    }

   
    
    // function option(option){
    //     var selected = $(option).find(':selected');
    //     var id = $(selected).val();

    //     var jumlah = $("#jumlah").val();
    //     // console.log(jumlah);

    //     $.get("{{ route('Perusahaan.Pesanan.dataBarang', ':id') }}".replace(':id', id), function(data){
    //         // console.log(data);
    //         $("#harga").val(data.harga_jual);
    //     });
    // }

    // function onjumlah(){
    //     var jumlah = $("#jumlah").val();
    //     // console.log(jumlah);
    //     var harga = $("#harga").val();
    //     // console.log(harga);
    //     var total = jumlah * harga ;

    //     // console.log(total);
       

    //     $("#total").val(total);
    //     $("#total_jumlah").val(jumlah);
    //     $("#total_harga").val(total);
        
    // }

    

// console.log(formatRupiah(10000));

    

    


    // var i = 1;
    function option2(option, i){
        // i++;
        var selected = $(option).find(':selected');
        var id = $(selected).val();

        $.get("{{ route('Perusahaan.Pesanan.dataBarang', ':id') }}".replace(':id', id), function(data){
            // console.log(data);
            $("#harga_"+i).val(data.harga_jual);
        });
    }

    function onjumlah2(i){
        var jumlah = $("#jumlah_"+i).val();
        var jumlah2 = 0;
        // console.log(jumlah);
        var harga = $("#harga_"+i).val();
        // console.log(harga);
        var total = jumlah * harga ;

        $("#total_"+i).val(total);

        //total_jumlah

        var row = $("#tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#jumlah_"+index).val();
            console.log(sub);
            var total1 = parseInt(total1) + parseInt(sub);
            $('#total_jumlah').val(total1);
           
        }

        //jumlah_harga

        var raw = $("#tbody > tr").length;
        console.log(raw);
        total2 =0;
        for (let index = 1; index <= raw; index++) {
            var sub2 = $("#total_"+index).val();
            console.log(sub2);
            var total2 = parseInt(total2) + parseInt(sub2);
            $('#total_harga').val(total2);
           
        }
       
        
    }

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
        $('#username').focus();
    }

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('Perusahaan.Pesanan.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    table.api().ajax.reload();
                    add();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('Perusahaan.Pesanan.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            location.reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }

    </script>

@endsection


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
                                            <th>NAMA PEMESAN</th>
                                            <th>JENIS PESANAN</th>
                                            <th>HARGA</th>
                                            <th>JUMLAH</th>
                                            <th>TOTAL</th>
                                            <th>TANGGAL</th>
                                            <th>KETERANGAN</th>
                                            <th>AKSI</th>
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
                                    <h4 id="formTitle">Tambah Data</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="col-md-8">
                                            <div class="form-group m-0">
                                                <label for="nama_pemesan" class="col-form-label s-12 col-md-2">Nama Pemesan</label>
                                                <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="" class="col-form-label s-12 col-md-2">Jenis Pesanan</label>
                                                
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="" class="col-form-label s-12 col-md-2"></label>
                                                <div class="col-md-10">
                                                    <table id="dinamic" class="table table-striped table-bordered" style="width:100%">
                                                        <thead class="text-center">
                                                            <th>Tambah</th>
                                                            <th width="30">No</th>
                                                            <th>JENIS PESANAN</th>
                                                            <th>HARGA</th>
                                                            <th>JUMLAH</th>
                                                            <th>TOTAL</th>
                                                            <th>KETERANGAN</th>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @php 
                                                             $a = 1;
                                                            @endphp
                                                            <tr>
                                                                <td class="text-center" ><i class="icon icon-plus text-success" id="tambah"></i></td>
                                                                <td>{{$a++}}</td>
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan" autocomplete="off">
                                                                        <option value="">Pilih</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="harga[]" id="harga" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="jumlah[]" id="jumlah" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="total[]" id="total" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="keterangan[]" id="keterangan" autocomplete="off" />    
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            </div>

                                           
                                            <div class="form-group mt-3">
                                                <label for="tanggal" class="col-form-label s-12 col-md-2">Tanggal Pesanan</label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="alamat" class="col-form-label s-12 col-md-2">Alamat</label>
                                                <input type="text" name="alamat" id="alamat" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
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
    // var table = $('#dataTable').dataTable({
    //     processing: true,
    //     serverSide: true,
    //     order: [ 0, 'asc' ],
    //     ajax: {
    //         url: "{{ route('Perusahaan.Jenis_Barang.api') }}",
    //         method: 'POST'
    //     },
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
    //         {data: 'nama_barang', name: 'nama_barang'},
    //         {data: 'harga_beli', name: 'harga_beli', render: $.fn.dataTable.render.number(',', '.', 0, '')},
    //         {data: 'harga_jual', name: 'harga_jual', render: $.fn.dataTable.render.number(',', '.', 0, '')},
            
    //         {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
    //     ]
    // });

   

    $(document).ready(function(){
        var i = 1;
        $('#tambah').click(function(){
            i++;
            $('#dinamic').append(`<tr>
                                                                <td class="text-center" ></td>
                                                                <td>`+ i +`</td>
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan" autocomplete="off">
                                                                        <option value="">Pilih</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="harga[]" id="harga" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="jumlah[]" id="jumlah" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="total[]" id="total" autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="keterangan[]" id="keterangan" autocomplete="off" />    
                                                                </td>
                                                                
                                                            </tr>`);
        });
    });

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

    // function remove(id){
    //     $.confirm({
    //         title: '',
    //         content: 'Apakah Anda yakin akan menghapus data ini ?',
    //         icon: 'icon icon-question amber-text',
    //         theme: 'modern',
    //         closeIcon: true,
    //         animation: 'scale',
    //         type: 'red',
    //         buttons: {
    //             ok: {
    //                 text: "ok!",
    //                 btnClass: 'btn-primary',
    //                 keys: ['enter'],
    //                 action: function(){
    //                     $.post("{{ route('Perusahaan.Jenis_Barang.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
    //                        table.api().ajax.reload();
    //                         if(id == $('#id').val()) add();
    //                     }, "JSON").fail(function(){
    //                         location.reload();
    //                     });
    //                 }
    //             },
    //             cancel: function(){}
    //         }
    //     });
    // }

    </script>

@endsection


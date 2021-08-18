@extends('layouts.main')
@section('title', 'EditCustomer')



@section('content')

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>                       
                        <i class="icon icon-users mr-2"></i>
                        Edit Customer                  
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
                                        <form class="needs-validation" id="form" method="POST" action="{{ route('Perusahaan.customer.update', $customer->id) }}" enctype="multipart/form-data" novalidate>
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$customer->id}}"/>
                                            <h4 id="formTitle">Edit Customer</h4><hr>
                                            <div class="form-row form-inline">
                                                <div class="col-md-8">
                                                    <div class="form-group m-0">
                                                        <label for="nama" class="col-form-label s-12 col-md-2">Nama Customer</label>
                                                        <input type="text" name="nama" id="nama" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$customer->nama}}"/>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="alamat" class="col-form-label s-12 col-md-2">Alamat</label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$customer->alamat}}"/>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label class="col-form-label s-12 col-md-2">Provinsi</label>
                                                        <div class="col-md-6 p-0 bg-light">
                                                            <select class="select2 form-control r-0 light s-12" name="provinsi" id="provinsi" autocomplete="off">
                                                                <option value="">Pilih</option>
                                                                    @foreach ($provinsi as $i)
                                                                    <option value="{{$i->id}}" {{ $i->id == $customer->provinsi ? 'selected' : '' }}>{{$i->n_provinsi}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label class="col-form-label s-12 col-md-2">Kabupaten</label>
                                                        <div class="col-md-6 p-0 bg-light">
                                                            <select class="select2 form-control r-0 light s-12" name="kabupaten" id="kabupaten" autocomplete="off">
                                                                @foreach ($kabupaten as $i)
                                                                <option value="{{$i->id}}" {{ $i->id == $customer->kabupaten ? 'selected' : '' }}>{{$i->n_kabupaten}}</option>
                                                                 @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label class="col-form-label s-12 col-md-2">Kecamatan</label>
                                                        <div class="col-md-6 p-0 bg-light">
                                                            <select class="select2 form-control r-0 light s-12" name="kecamatan" id="kecamatan" autocomplete="off">
                                                                @foreach ($kecamatan as $i)
                                                                <option value="{{$i->id}}" {{ $i->id == $customer->kecamatan ? 'selected' : '' }}>{{$i->n_kecamatan}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label class="col-form-label s-12 col-md-2">Kelurahan</label>
                                                        <div class="col-md-6 p-0 bg-light">
                                                            <select class="select2 form-control r-0 light s-12" name="kelurahan" id="kelurahan" autocomplete="off">
                                                                @foreach ($kelurahan as $i)
                                                                <option value="{{$i->id}}" {{ $i->id == $customer->kelurahan ? 'selected' : '' }}>{{$i->n_kelurahan}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="no_telepon" class="col-form-label s-12 col-md-2">No Telepon</label>
                                                        <input type="text" name="no_telepon" id="no_telepon" class="form-control r-0 light s-12 col-md-6" autocomplete="off"value="{{$customer->no_telepon}}"/>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="no_pic" class="col-form-label s-12 col-md-2">No Pic</label>
                                                        <input type="text" name="no_pic" id="no_pic" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$customer->no_pic}}"/>
                                                    </div>
                                                

                                                    
                                                    <div class="mt-4" style="margin-left: 17%">
                                                        <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>
                                                       
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

$('#provinsi').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kabupaten').html(option);
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kabupaten').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kabupatenByProvinsi', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kabupaten +"</li>";
                    });
                    $('#kabupaten').empty().html(option);

                    $("#kabupaten").val($("#kabupaten option:first").val()).trigger("change.select2");
                }else{
                    $('#kabupaten').html(option);
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#kabupaten').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kecamatan').html(option);
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kecamatan').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kecamatanByKabupaten', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kecamatan +"</li>";
                    });
                    $('#kecamatan').empty().html(option);

                    $("#kecamatan").val($("#kecamatan option:first").val()).trigger("change.select2");
                }else{
                    $('#kecamatan').html(option);
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    $('#kecamatan').on('change', function(){
        val = $(this).val();
        option = "<option value=''>&nbsp;</option>";
        if(val == ""){
            $('#kelurahan').html(option);
            selectOnChange();
        }else{
            $('#kelurahan').html("<option value=''>Loading...</option>");
            url = "{{ route('Perusahaan.kelurahanByKecamatan', ':id') }}".replace(':id', val);
            $.get(url, function(data){
                if(data){
                    $.each(data, function(index, value){
                        option += "<option value='" + value.id + "'>" + value.n_kelurahan +"</li>";
                    });
                    $('#kelurahan').empty().html(option);

                    $("#kelurahan").val($("#kelurahan option:first").val()).trigger("change.select2");
                }else{
                    $('#kelurahan').html(option);
                    selectOnChange();
                }
            }, 'JSON');
        }
    });

    </script>

@endsection

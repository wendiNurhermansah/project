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
                                        <form class="needs-validation" id="form" method="POST" action="{{ route('Perusahaan.Jenis_Barang.update', $barang->id) }}" enctype="multipart/form-data" novalidate>
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$barang->id}}"/>
                                            <h4 id="formTitle">Edit Customer</h4><hr>
                                            <div class="form-row form-inline">
                                                <div class="col-md-8">
                                                    <div class="form-group m-0">
                                                        <label for="nama_barang" class="col-form-label s-12 col-md-2">Nama Barang</label>
                                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$barang->nama_barang}}"/>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="harga_beli" class="col-form-label s-12 col-md-2">Harga Beli</label>
                                                        <input type="text" name="harga_beli" id="harga_beli" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$barang->harga_beli}}"/>
                                                    </div>
                                                
                                                    <div class="form-group mt-3">
                                                        <label for="harga_jual" class="col-form-label s-12 col-md-2">Harga Jual</label>
                                                        <input type="text" name="harga_jual" id="harga_jual" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$barang->harga_jual}}"/>
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
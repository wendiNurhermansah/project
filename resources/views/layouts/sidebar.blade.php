<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <div id="navigasi" class="row m-t-12">
                <li type="none" class="mr-1 ml-2 fs-13 text-white">
                    <i class="icon icon-calendar-check-o"></i>
                    <a id="hari"></a>
                    ,
                    <a id="tanggal"></a>
                    <a id="bulan"></a>
                    <a id="tahun"></a>
                    /
                </li>
                <li type="none" class="fs-13 text-white">
                    <a id="jam"></a>
                    :
                    <a id="menit"></a>
                    :
                    <a id="detik"></a>
                </li>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    
                    
                    <!-- User Account-->
                    <li class="dropdown custom-dropdown user user-menu ">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="{{asset('assets/img/dummy/u2.png')}}" class="user-image" alt="User Image">
                            <i class="icon-more_vert "></i>
                        </a>
                        <div class="dropdown-menu p-4 dropdown-menu-right" style="width:255px">
                            <div class="box justify-content-between">
                                <div class="col">
                                   
                                        <img class="user_avatar" src="{{asset('assets/img/dummy/u2.png')}}" alt="User Image">
                                        <h6 class="font-weight-light mt-2 mb-1">{{Auth::User()->username}}</h6>
                                     
                                        
                                </div>
                                <div class="col">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action mt-2"><i class="mr-2 icon-power-off text-danger"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                </div>
                            </div>
                       
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    // Hours
    window.setTimeout("waktu()", 1000);

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = addZero(waktu.getHours());
        document.getElementById("menit").innerHTML = addZero(waktu.getMinutes());
        document.getElementById("detik").innerHTML = addZero(waktu.getSeconds());
    }

    // Day
    arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]
    Hari = new Date().getDay();
    document.getElementById("hari").innerHTML = arrHari[Hari];

    // Date
    Tanggal = new Date().getDate();
    document.getElementById("tanggal").innerHTML = Tanggal;

    // Month
    arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    Bulan = new Date().getMonth();
    document.getElementById("bulan").innerHTML = arrbulan[Bulan];

    // Year
    Tahun = new Date().getFullYear();
    document.getElementById("tahun").innerHTML = Tahun;

</script>

<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li class="treeview"><a href="#">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>

    <li class="header light"><strong>MASTER ROLE</strong></li>
    @can('Role')
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Role</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('Permission')
    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Permission</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('Pengguna')
    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    <li class="header light"><strong>PERUSAHAAN</strong></li>
    @can('Customer')
    <li>
        <a href="{{route('Perusahaan.customer.index')}}">
            <i class="icon icon-users amber-text s-18"></i> <span>Custumer</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('Barang')
    <li class="no-b">
        <a href="{{route('Perusahaan.Jenis_Barang.index')}}">
            <i class="icon icon-list2 text-success s-18"></i> <span>Jenis Barang</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('Pesanan')
    <li>
        <a href="{{route('Perusahaan.Pesanan.index')}}"><i class="icon icon-shop blue-text s-18"></i>
        <span>Pesanan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
</ul>

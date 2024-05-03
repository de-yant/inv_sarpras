<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" width="50" height="50" alt="">
                    <span class="text-uppercase"> | SARPRAS</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li>
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/sidebar/icon-1.png') }}"
                            alt="icon"><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('sumberdana') }}"><img src="{{ asset('assets/img/sidebar/icon-11.png') }}"
                            alt="icon"><span>Sumber Barang</span></a>
                </li>
                <li>
                    <a href="{{ route('dataruangan') }}"><img src="{{ asset('assets/img/sidebar/icon-15.png') }}"
                            alt="icon"><span>Data Ruangan</span></a>
                </li>
                <li>
                    <a href="{{ route('databarang') }}"><img src="{{ asset('assets/img/sidebar/icon-26.png') }}"
                            alt="icon"><span>Data Barang</span></a>
                </li>
                {{-- <li>
                    <a href="{{ route('datapinjaman') }}"><img src="{{ asset('assets/img/sidebar/icon-6.png') }}"
                            alt="icon"><span>Data Pinjaman</span></a>
                </li>
                <li>
                    <a href="{{ route('pengadaan') }}"><img src="{{ asset('assets/img/sidebar/icon-7.png') }}"
                            alt="icon"><span>Data Pengadaan</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

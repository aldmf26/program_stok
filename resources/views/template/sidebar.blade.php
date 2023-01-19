<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0">
                    <a href="{{ route('barang') }}" class="site_title">
                        <img src="{{ asset('assets/img/logo.png') }}" width="25%" alt="">
                        <span>Abude Group</span></a>
                </div>
                <div class="clearfix"></div>

                <br />

                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        {{-- <h3>General</h3> --}}
                        {{-- <li class="nav">
                            <a href="{{ route('pegawai') }}" class="nav navbar text-light"><i
                                    class="fa fa-users mr-1"></i> Data Pegawai</a>
                        </li> --}}
                        <li class="nav mt-3">
                            <a href="{{ route('barang') }}" class="nav navbar text-light"><i
                                    class="fa fa-cubes mr-1"></i> Data Barang</a>
                        </li>

                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-external-link"></i> Stok
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{ route('stok', ['jenis' => 'masuk']) }}">Stok Masuk</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('stok', ['jenis' => 'keluar']) }}">Stok Keluar</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        {{-- <li class="nav">
                            <a href="{{ route('pemeliharaan') }}" class="nav navbar text-light"><i
                                    class="fa fa-cube mr-1"></i> Data Pemeliharaan</a>
                        </li>
                        <li class="nav mt-3">
                            <a href="{{ route('service') }}" class="nav navbar text-light"><i
                                    class="fa fa-list-alt mr-1"></i> Data Selesai Service</a>
                        </li> --}}
                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-file"></i> Master Data
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{ route('pegawai') }}">Data Pegawai</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('suplier') }}">Data Suplier</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pemeliharaan') }}">Data Pemeliharaan</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service') }}">Data Selesai Service</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cabang') }}">Data Cabang</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('jenis') }}">Data Jenis</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('satuan') }}">Data Satuan</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav side-menu">
                            <li>
                                <a><i class="fa fa-book"></i> Laporan
                                    <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        <a href="{{ route('lapPegawai') }}">Data Pegawai</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapBarang') }}">Data Barang</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapStok', ['jenis' => 'masuk']) }}">Data Stok Masuk</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapStok', ['jenis' => 'keluar']) }}">Data Stok Keluar</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapPemeliharaan') }}">Data Pemeliharaan</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapSelesai') }}">Data Selesai Service</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapSuplier') }}">Data Suplier</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('lapPengambilan') }}">Data Pengambilan Bahan</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('satuan') }}">Data Satuan</a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                        <li class="nav">
                            <a href="{{ route('user') }}" class="nav navbar text-light"><i
                                    class="fa fa-user mr-1"></i> Manajemen User</a>
                        </li>
                    </div>

                </div>

            </div>
        </div>

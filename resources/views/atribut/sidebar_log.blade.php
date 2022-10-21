<div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                        @if(Auth::user()->role1 == 'Administrator')
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{ '/home' }}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Komponen</li>
                                <li>
                                    <a href="/profileAdm">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                       My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="dataPendaftar">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Data mahasiswa
                                    </a>
                                </li>
                                <li>
                                    <a href="/pendaftarNew">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Daftar pendaftar
                                    </a>
                                </li>
                                <li>
                                    <a href="/dataDonatur">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Data Donatur
                                    </a>
                                </li>
                                <li>
                                    <a href="/addDonaturAdm">
                                        <i class="metismenu-icon pe-7s-add-user"></i>
                                        Tambah Donatur
                                    </a>
                                </li>
                                <li>
                                    <a href="/dataBantuan">
                                        <i class="metismenu-icon pe-7s-cash"></i>
                                        Data Bantuan
                                    @if(auth::user()->role_langsung == 0)
                                    <span class="badge badge-danger">New</span>
                                    @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/dataBantuanUmum">
                                        <i class="metismenu-icon pe-7s-cash"></i>
                                        Data Bantuan Umum
                                    </a>
                                </li>
                                <li>
                                    <a href="/dataBantuanLangsung">
                                        <i class="metismenu-icon pe-7s-cash"></i>
                                        Data Bantuan Langsung
                                    </a>
                                </li>
                                <li>
                                    <a href="/infakAdmin">
                                        <i class="metismenu-icon pe-7s-credit"></i>
                                        Infak admin
                                    </a>
                                </li>
                                <li>
                                    <a href="/editPasswordAdm">
                                        <i class="metismenu-icon pe-7s-key"></i>
                                        Edit Password
                                    </a>
                                </li>
                            </ul>
                            @elseif(Auth::user()->role1 == 'Donatur')
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{ '/home' }}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Komponen</li>
                                <li>
                                    <a href="/profileDon">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                       My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="/listMahasiswa">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                       Mahasiswa
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="/listMahasiswa">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Data Mahasiswa
                                    </a>
                                </li> -->
                                @if(auth::user()->role_bantu == 1)
                                <li>
                                    <a href="/bantuanMhs">
                                        <i class="metismenu-icon pe-7s-smile"></i>
                                        Mahasiswa yang di bantu
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="/bantuanUmum">
                                        <i class="metismenu-icon pe-7s-smile"></i>
                                        Bantuan umum
                                    </a>
                                </li>
                                <li>
                                    <a href="/bantuanLangsung">
                                        <i class="metismenu-icon pe-7s-cash"></i>
                                        Jumlah bantuan langsung
                                    </a>
                                </li>
                                <li>
                                    <a href="/jumlahUmum">
                                        <i class="metismenu-icon pe-7s-credit"></i>
                                        Jumlah bantuan umum
                                    </a>
                                </li>
                                <li>
                                    <a href="/bantuAdmin">
                                        <i class="metismenu-icon pe-7s-credit"></i>
                                        Infak admin
                                    </a>
                                </li>
                                <li>
                                    <a href="/historyDonatur">
                                        <i class="metismenu-icon pe-7s-notebook"></i>
                                        History Bantaun Umum
                                    </a>
                                </li>
                                <li>
                                    <a href="editPasswordDonatur">
                                        <i class="metismenu-icon pe-7s-key"></i>
                                        Edit Password
                                    </a>
                                </li>
                            </ul>
                            @elseif(Auth::user()->role1 == 'Mahasiswa')
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{ '/home' }}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Komponen</li>
                                <li>
                                    <a href="/lengkapi">
                                        <i class="metismenu-icon pe-7s-file"></i>
                                        Lengkapi persyaratan
                                    </a>
                                </li>
                                <li>
                                    <a href="/status">
                                        <i class="metismenu-icon pe-7s-refresh"></i>
                                        Status Pendaftaran
                                    </a>
                                </li>
                                <li>
                                    <a href="/umum">
                                        <i class="metismenu-icon pe-7s-credit"></i>
                                        Bantuan umum
                                    </a>
                                </li>
                                <li>
                                    <a href="/profileMah">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                       My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="/editPasswordStudent">
                                        <i class="metismenu-icon pe-7s-key"></i>
                                        Edit Password
                                    </a>
                                </li>
                            </ul>
                            @endif;
                        </div>
                    </div>
                </div>
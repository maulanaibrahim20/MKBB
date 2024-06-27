<!-- start: Sidebar -->
<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
    <div class="d-flex align-items-center p-3">
        <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">DSH Pelapak</a>
        <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
    </div>
    <ul class="sidebar-menu d-flex flex-column p-3 m-0 mb-0 h-100">
        <li class="sidebar-menu-item">
            <a href="{{ route('penjual')}}">
                <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Menu pelapak</li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-pages-line sidebar-menu-item-icon"></i>
                Pages
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('produk')}}">
                        Uplod produk
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item has-dropdown">
                    <a href="#">
                        Terima Pesanan
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu">
                        <li class="sidebar-dropdown-menu-item">
                            <a href="{{ route('pesanan')}}">
                                Pesanan masuk
                            </a>
                        </li>
                        <li class="sidebar-dropdown-menu-item">
                            <a href="{{ route('pesanan2')}}">
                                Pesanan Dikirim
                            </a>
                        </li>
                        <li class="sidebar-dropdown-menu-item">
                            <a href="{{ route('riwayat')}}">
                                Riwayat pesanan
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-wallet-line sidebar-menu-item-icon"></i>
                    Dompet
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="{{ route('penjualan')}}">
                        Riwayat penjualan
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="#">
                        Hasil Penjualan
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('profil')}}">
                <i class="ri-user-line sidebar-menu-item-icon"></i>
                Edit profil
            </a>
        </li>
        <!-- Element spacer untuk mendorong elemen logout ke bawah -->
        <div class="flex-grow-1"></div>
        <li class="sidebar-menu-item">
            <a href="#">
                <i class="ri-settings-line sidebar-menu-item-icon"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-overlay"></div>
<!-- end: Sidebar -->
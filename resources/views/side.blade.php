<!-- start: Sidebar -->
<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end" id="sidebar">
    <div class="d-flex align-items-center p-3">
        <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Admin</a>
        <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block" id="sidebarToggle"></i>
    </div>
    <ul class="sidebar-menu d-flex flex-column p-3 m-0 mb-0 h-100">
        <li class="sidebar-menu-item">
            <a href="index.html">
                <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                Dashboard
            </a>
        </li>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Menu pelapak</li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-store-line sidebar-menu-item-icon"></i>
                Market/Toko
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item has-dropdown">
                    <a href="#">
                        Produk
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu">
                        <li class="sidebar-dropdown-menu-item">
                            <a href="produk.html">
                                Table Produk
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item has-dropdown">
            <a href="#">
                <i class="ri-user-line sidebar-menu-item-icon"></i>
                    Akun
                <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li class="sidebar-dropdown-menu-item">
                    <a href="Tcustom.html">
                        Customer
                    </a>
                </li>
                <li class="sidebar-dropdown-menu-item">
                    <a href="Tpenjual.html">
                        Toko / Penjual
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item">
            <a href="blog.html">
                <i class="ri-pencil-line sidebar-menu-item-icon"></i>
                Blogs
            </a>
        </li>
        <!-- Element spacer untuk mendorong elemen logout ke bawah -->
        <div class="flex-grow-1"></div>
        <li class="sidebar-menu-item">
            <a href="{{ route('Tlogin') }}">
                <i class="ri-settings-line sidebar-menu-item-icon"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-overlay"></div>
<!-- end: Sidebar -->
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var isCollapsed = sidebar.style.width === '80px';

        if (isCollapsed) {
            sidebar.style.width = '250px';
            Array.from(sidebar.querySelectorAll('.sidebar-logo')).forEach(function(element) {
                element.style.display = 'block';
            });
            Array.from(sidebar.querySelectorAll('.sidebar-menu-item a')).forEach(function(element) {
                element.style.justifyContent = 'flex-start';
            });
            Array.from(sidebar.querySelectorAll('.sidebar-dropdown-menu')).forEach(function(element) {
                element.style.display = 'block';
            });
        } else {
            sidebar.style.width = '80px';
            Array.from(sidebar.querySelectorAll('.sidebar-logo')).forEach(function(element) {
                element.style.display = 'none';
            });
            Array.from(sidebar.querySelectorAll('.sidebar-menu-item a')).forEach(function(element) {
                element.style.justifyContent = 'center';
            });
            Array.from(sidebar.querySelectorAll('.sidebar-dropdown-menu')).forEach(function(element) {
                element.style.display = 'none';
            });
        }
    });
</script>

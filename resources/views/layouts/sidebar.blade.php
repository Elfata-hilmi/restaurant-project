<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Restaurant</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('product.index')}}">
                <i class="fa fa-id-card" aria-hidden="true"></i>
                    <span>Makanan</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('minuman.index')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                    <span>Minuman</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('pegawai.index')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                    <span>Staff Pegawai</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('merchandise.index')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                    <span>Merchandise</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('testimoni.index')}}">
                <i class="fa fa-university" aria-hidden="true"></i>
                    <span>Testimoni</span></a>
            </li>

            <!-- Divider -->
            

        </ul>
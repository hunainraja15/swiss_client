
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                aria-label="Search..." />
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        {{-- profile --}}
       {{-- <li>
        <a href="{{ route('user.profile') }}">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpzkqmu8RTm0bAg4s0ShPQzvDuTlRzQB1kaQ&s" class="m-5" width="50px" alt="">
        </a>
       </li> --}}
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item btn btn-danger">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                </a>
            </form>
        </li>
        <!--/ User -->
    </ul>
</div>
</nav>

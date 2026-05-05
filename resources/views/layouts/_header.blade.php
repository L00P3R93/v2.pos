<!-- Header -->
<div class="header pos-header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('home') }}" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" style="width: 40px !important; height: 40px !important;"  alt="Img">
        </a>
        <a href="{{ route('home') }}" class="logo logo-white">
            <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" style="width: 40px !important; height: 40px !important;"  alt="Img">
        </a>
        <a href="{{ route('home') }}" class="logo-small">
            <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" style="width: 30px !important; height: 30px !important;"  alt="Img">
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn d-none" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item time-nav"></li>
        <!-- /Search -->

        <li class="nav-item pos-nav">
            <a href="{{ route('home') }}" class="btn btn-purple btn-md d-inline-flex align-items-center">
                <i class="ti ti-home me-1"></i>Home
            </a>
        </li>

        <li class="nav-item nav-item-box">
            <a href="#" data-bs-toggle="modal" data-bs-target="#calculator" class="bg-orange border-orange text-white"><i class="ti ti-calculator"></i></a>
        </li>
        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Maximize" >
                <i class="ti ti-maximize"></i>
            </a>
        </li>
        <li class="nav-item nav-item-box" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Today’s Sale">
            <a href="#" data-bs-toggle="modal" data-bs-target="#today-sale"><i class="ti ti-progress"></i></a>
        </li>

        <li class="nav-item dropdown has-arrow main-drop profile-nav">
            <a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info p-0">
                    <span class="user-letter">
                        <img src="{{ auth()->user()->gravatar_url }}" alt="Img" class="img-fluid">
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img src="{{ auth()->user()->gravatar_url }}" alt="Img">
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            <h6>{{ auth()->user()->name }}</h6>
                            <h5>{{ auth()->user()->getRoleNames()->first() }}</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="#"><i class="me-2" data-feather="user"></i>My Profile</a>
                    <a class="dropdown-item" href="#"><i class="me-2" data-feather="settings"></i>Settings</a>
                    @if(auth()->user()->hasAnyRole(['Super Admin', 'Admin', 'Manager', 'Accountant', 'Inventory']))
                    <a class="dropdown-item" href="/admin"><i class="me-2" data-feather="layout"></i>Admin Panel</a>
                    @endif
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"><img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- Header -->

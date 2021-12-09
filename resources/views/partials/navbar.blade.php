<div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container">
                    {{-- logo --}}

                    <a class="navbar-brand mt-3" href="#page-top">
                        <img src="../assets2/img/logo-brother.png" alt="..." style="height: 70px; width: 70px"/>
                    </a>

                    <ul class="navbar-nav navbar-right d-flex align-items-center">

                        @auth
                            @if (Auth()->user())
                                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                        <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()-> username }}</div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="/" class="dropdown-item has-icon">
                                            <i class="fas fa-home"></i> Home
                                        </a>
                                        <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                                            <i class="far fa-user"></i> Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        @if (Auth()->user())
                                            @if (Auth()->user()->role == 'admin')
                                                <a href="#" class="dropdown-item has-icon">
                                                    <i class="fas fa-receipt"></i>List Reservasi
                                                </a>

                                                <a href="{{ route('barber.index') }}" class="dropdown-item has-icon">
                                                    <i class="fas fa-hotel"></i>Tambah Outlet
                                                </a>

                                                <a href="{{ route('layanan.index') }}" class="dropdown-item has-icon">
                                                    <i class="fas fa-cart-plus"></i>Tambah Layanan
                                                </a>


                                            @else
                                            <a href="/order" class="dropdown-item has-icon">
                                                <i class="fas fa-shopping-bag"></i>My-Booking
                                            </a>
                                            @endif
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <form action="/auth/logout" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="has-icon text-danger fas fa-sign-out-alt"></i> Logout
                                            </button>
                                        </form>
                                    </div>
                                </li>

                            @endif
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="badge badge-warning">Login</a>
                        @endauth
                        </li>
                    </ul>
                </div>
            </nav>

<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            {{-- utlisateur de session --}}
                
                <div class="container-fluid py-1 px-3">
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                            @csrf
                        </form>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                @auth
                                <li class="nav-item dropdown lang-dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        id="lang-dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i>
                                        <span class="hidden-sm">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                        @csrf
                                    </form>

                                    <div class="dropdown-menu shadow">
                                        <a class="dropdown-item"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Deconnecter</a>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </li>
                            @endauth
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
    </div>
</nav>
<!-- End Navbar -->

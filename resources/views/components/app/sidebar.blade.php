<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-white fixed-start">
    <div class="sidenav-header" style="text-align: center">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a href=""><img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG-XwB2jQgl03o2AZ_-LUf5bZNGikUPBnegXWFcSkz3Q&s"
                alt="DLC" style="width:100px;height:90px;text-align:center"></a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (auth()->user()->role !== 'admin')
                <li class="nav-item">
                    <a class="nav-link  {{ is_current_route('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>dashboard</title>
                                <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z"
                                            id="Path"></path>
                                        <path class="color-background"
                                            d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z"
                                            id="Path"></path>
                                        <path class="color-background"
                                            d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Inscription</span>
                    </a>
                </li>
                @if (auth()->user()->in_formation == true)
                    <li class="nav-item mt-2">
                        <div class="d-flex align-items-center nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2"
                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-weight-normal text-md ms-2">Laravel Examples</span>
                        </div>
                    </li>
                    <li class="nav-item border-start my-0 pt-2">
                        <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('users.profile') ? 'active' : '' }}"
                            href="{{ route('users.profile') }}">
                            <span class="nav-link-text ms-1">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item border-start my-0 pt-2">
                        <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('session.formation') ? 'active' : '' }}"
                            href="{{ route('session.formation') }}">
                            <span class="nav-link-text ms-1">Session planifier</span>
                        </a>
                    </li>
                @endif
            @endif
            @if (auth()->user()->role === 'admin')
                <li class="nav-item mt-2">
                    <div class="d-flex align-items-center nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="ms-2"
                            viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-weight-normal text-md ms-2">Admin Pages</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('tables') ? 'active' : '' }}"
                        href="{{ route('tables') }}">
                        <span class="nav-link-text ms-1">Tables</span>
                    </a>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('users-management') ? 'active' : '' }}"
                        href="{{ route('users-management') }}">
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('formateurs-management') ? 'active' : '' }}"
                        href="{{ route('formateurs-management') }}">
                        <span class="nav-link-text ms-1">Formateur Management</span>
                    </a>
                </li>

                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('profile') ? 'active' : '' }}"
                        href="{{ route('profile') }}">
                        <span class="nav-link-text ms-1">Profile-admin</span>
                    </a>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('attestation') ? 'active' : '' }}"
                        href="{{ route('attestation') }}">
                        <span class="nav-link-text ms-1">Attestations</span>
                    </a>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('reservation') ? 'active' : '' }}"
                        href="{{ route('reservation.index') }}">
                        <span class="nav-link-text ms-1">Reservation</span>
                    </a>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('session') ? 'active' : '' }}"
                        href="{{ route('session.index') }}">
                        <span class="nav-link-text ms-1">Session de formation</span>
                    </a>
                </li>
            @endif


        </ul>
    </div>

</aside>

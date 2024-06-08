<nav class="navbar bg-white navbar-expand-lg flex-wrap top-0 px-0 py-0">
    <div class="container py-2">
        <nav aria-label="breadcrumb">
            <div class="sidenav-header" style="text-align: center">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG-XwB2jQgl03o2AZ_-LUf5bZNGikUPBnegXWFcSkz3Q&s" alt="DLC" style="width:100px;height:90px;text-align:center"></a>
            </div>       
        </nav>
        <ul class="navbar-nav d-none d-lg-flex">            
            <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
                <a href="{{ route('users-management') }}" class="nav-link text-black p-0">
                    Navigation
                </a>
            </li>         
        </ul>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav ms-md-auto  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-black p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown d-flex align-items-center ps-2">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link px-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">Déconnexion</button>
                    </form>
                </li>                                
            </ul>
        </div>
    </div>
    <hr class="horizontal w-100 my-0 dark">
</nav>

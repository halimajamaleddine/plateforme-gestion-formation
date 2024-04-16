<x-guest-layout>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Liste des photos -->
                            <div class="d-flex justify-content-start mb-3" style="margin-top: 10%">
                                <img src="../assets/img/img-ME.jpg" style="width: 80%; height: 50%;" alt="Photo 1" class="me-3">
                                {{-- <img src="../assets/img/img-um5.jpg" style="width: 100%; height: 50%;" alt="Photo 3" class="me-3"> --}}
                                <img src="../assets/img/img-D.jpg" style="width: 50%; height: 50%;" alt="Photo 2" class="me-3">
                                <!-- Ajoutez autant d'images que nécessaire -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h3 class="font-weight-black text-dark display-6">Welcome back</h3>
                                    <p class="mb-0">Welcome back!</p>
                                    <p class="mb-0">créer un nouveau compte<br></p>
                                    <p class="mb-0">ou connectez-vous </p>
                                    {{-- <p class="mb-0">Email: <b>admin@corporateui.com</b></p>
                                    <p class="mb-0">Password: <b>secret</b></p> --}}
                                </div>
                                <div class="text-center">
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @error('message')
                                        <div class="alert alert-danger text-sm" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start" method="POST" action="sign-in">
                                        @csrf
                                        <label>adresse e-mail</label>
                                        <div class="mb-3">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Enter your email address"
                                                value="{{ old('email') ? old('email') : 'admin@corporateui.com' }}"
                                                aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <label>mot de passe
                                        </label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password"
                                                value="{{ old('password') ? old('password') : 'secret' }}"
                                                class="form-control" placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form-check-info text-left mb-0">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                                                    Se souvenir pendant 14 jours </label>
                                            </div>
                                            <a href="{{ route('password.request') }}"
                                                class="text-xs font-weight-bold ms-auto">Mot de passe oublié</a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-dark w-100 mt-4 mb-3">s'inscrire</button>
                                            <button type="button" class="btn btn-white btn-icon w-100 mb-3">
                                                <span class="btn-inner--icon me-1">
                                                    <img class="w-5" src="../assets/img/logos/google-logo.svg"
                                                        alt="google-logo" />
                                                </span>
                                                <span class="btn-inner--text">Se connecter avec google</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto">
                                        Vous n’avez pas de compte ?
                                        <a href="{{ route('sign-up') }}"
                                            class="text-dark font-weight-bold">s'inscrire</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8"
                                    style="background-image:url('../assets/img/img-login.jpg')">
                                    <div
                                        class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                                        <h2 class="mt-3 text-dark font-weight-bold">Digital Learning Center</h2>
                                        <h6 class="text-dark text-sm mt-5">Copyright © 2024 Corporate UI Design System
                                            by Creative Tim.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>

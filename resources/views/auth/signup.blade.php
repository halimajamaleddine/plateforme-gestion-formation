<x-guest-layout>


    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8"
                                style="background-image:url('../assets/img/img-login.jpg')">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-black text-dark display-6">S'inscrire</h3>
                                    <p class="mb-0">Ravi de vous rencontrer! Veuillez entrer vos coordonnées.</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('sign-up') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <label>Nom</label>
                                        <div class="mb-3">
                                            <input type="text" id="nom" name="nom" class="form-control"
                                                placeholder="Entre votre nom" value="{{ old('nom') }}"
                                                aria-label="Nom" aria-describedby="name-addon">
                                            @error('nom')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label>Prenom</label>
                                        <div class="mb-3">
                                            <input type="text" id="prenom" name="prenom" class="form-control"
                                                placeholder="Entre votre prenom" value="{{ old('prenom') }}"
                                                aria-label="Prenom" aria-describedby="name-addon">
                                            @error('prenom')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label>Email Address</label>
                                        <div class="mb-3">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Entre votre address email " value="{{ old('email') }}"
                                                aria-label="Email" aria-describedby="email-addon">
                                            @error('email')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Create a password" aria-label="Password"
                                                aria-describedby="password-addon">
                                            @error('password')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">S'inscrire
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-xs mx-auto">
                                        Vous avez déjà un compte?
                                        <a href="{{ route('sign-in') }}" class="text-dark font-weight-bold">Se
                                            connecter</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>

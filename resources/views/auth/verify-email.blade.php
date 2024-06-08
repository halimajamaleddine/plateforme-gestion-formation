<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h3 class="font-weight-black text-dark display-6">Vérifiez votre email</h3>
                                    <p class="mb-0">Un email de vérification a été envoyé à votre adresse email.</p>
                                    <p class="mb-0">Veuillez vérifier votre email pour continuer.</p>
                                </div>
                                <div class="card-body text-center">
                                    @if (session('message'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-dark mt-4 mb-3">Renvoyer l'email de vérification</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>

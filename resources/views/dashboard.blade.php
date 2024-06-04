<x-app-layout>
    <x-app.navbar titlePage="Dashboard" />

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Bienvenue, {{ auth()->user()->nom }}{{ ' ' }}
                                {{ auth()->user()->prenom }}</h3>

                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" />
                <title>Custom Bootstrap 4 card</title>
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500&amp;subset=latin-ext"
                    rel="stylesheet">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
                <link rel="stylesheet" href="">
            </head>


            <body>
                <div class="container">
                    <div class="row pt-5 m-auto">
                        @foreach ($formations as $formation)
                            <div class="col-md-6 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img"
                                        style="background-image: url('{{ asset('storage/' . $formation->fichier) }}')">
                                    </div>
                                    <div class="card-custom-avatar">

                                    </div>
                                    <div class="card-body" style="overflow-y: auto">
                                        <h4 class="card-title">{{ $formation->titre }}</h4>
                                        <p class="card-text">{{ $formation->objectif }}</p>
                                        <p class="card-text">{{ $formation->contenu }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $formation->date }}</small>
                                        </p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <form action="{{ route('inscription') }}" method="get">
                                            @csrf
                                            <input type="hidden" name="formations_id" value="{{ $formation->formations_id }}">
                                            <button class="btn btn-primary" type="submit">S'inscrire</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </body>

            </html>
            
            <x-app.footer />
        </div>
    </main>

</x-app-layout>
<style>
    html {
        font-size: 14px;
    }

    .container {
        font-size: 14px;
        color: #666666;
        font-family: "Open Sans";
    }

    .card-custom-img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .card-custom-avatar img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .card-custom {
        overflow: hidden;
        min-height: 450px;
        box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
    }

    .card-custom-img {
        height: 200px;
        min-height: 200px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        border-color: inherit;
    }

    /* First border-left-width setting is a fallback */
    .card-custom-img::after {
        position: absolute;
        content: '';
        top: 161px;
        left: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-top-width: 40px;
        border-right-width: 0;
        border-bottom-width: 0;
        border-left-width: 545px;
        border-left-width: calc(575px - 5vw);
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: inherit;
    }

    .card-custom-avatar img {
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        position: absolute;
        top: 100px;
        left: 1.25rem;
        width: 100px;
        height: 100px;
    }
</style>

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="container">
                <!-- Bouton pour ajouter une nouvelle session -->
                <div class="text-end mb-3">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter
                        une nouvelle session</a>
                </div>
                {{-- modal d'ajout de session  --}}
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une session de formation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="row justify-content-center">
                                        <div class="col-lg-9 col-12">
                                            @if (session('error'))
                                                <div class="alert alert-danger" role="alert" id="alert">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success" role="alert" id="alert">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-6 row justify-content-center">
                                        <div class="col-lg-15">
                                            <div class="card" id="basic-info">
                                                <div class="pt-0 card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="dateDebut">Date debut <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="dateDebut" id="dateDebut"
                                                                placeholder="dateDebut" class="form-control">
                                                            @error('dateDebut')
                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="datefin">Date fin <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="datefin" id="datefin"
                                                                placeholder="datefin" class="form-control">
                                                            @error('datefin ')
                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="salle">Salle <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="salle" id="salle"
                                                                placeholder="salle" class="form-control">
                                                            @error('salle')
                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="formateur">Formateur <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="formateur" id="formateur"
                                                                class="form-control">
                                                                <option value="">Sélectionner un formateur
                                                                </option>
                                                                @foreach ($formateurs as $formateur)
                                                                    <option value="{{ $formateur->id }}">
                                                                        {{ $formateur->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('formateur')
                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="formation">Formation <span
                                                                class="text-danger">*</span></label>
                                                        <select name="formation" id="formation" class="form-control">
                                                            <option value="">Sélectionner un formation
                                                            </option>
                                                            {{-- @foreach ($formateurs as $formateur) --}}
                                                            <option value="">
                                                            </option>
                                                            {{-- @endforeach --}}
                                                        </select>
                                                        @error('formateur')
                                                            <span class="text-danger text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5>Ressource</h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="nom_ressource">Nom de la ressource <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="nom_ressource" id="nom_ressource"
                                                            placeholder="Nom de la ressource" class="form-control">
                                                        @error('nom_ressource')
                                                            <span class="text-danger text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="type_ressource">Type de ressource <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="type_ressource"
                                                            id="type_ressource" placeholder="Type de ressource"
                                                            class="form-control">
                                                        @error('type_ressource')
                                                            <span class="text-danger text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="this.form.submit()" data-bs-dismiss="modal"
                                    class="btn btn-primary">Ajouter</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{-- fin modal --}}
            {{-- affichage des cards des sassion  --}}
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h5 class="card-title">MOM</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    <div class="widget-49-date-primary">
                                        <span class="widget-49-date-day">09</span>
                                        <span class="widget-49-date-month">apr</span>
                                    </div>
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">PRO-08235 DeskOpe. Website</span>
                                        <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                                    </div>
                                </div>
                                <ol class="widget-49-meeting-points">
                                    <li class="widget-49-meeting-item"><span>Expand module is removed</span></li>
                                    <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                                    <li class="widget-49-meeting-item"><span>Session timeout increase to 30
                                            minutes</span></li>
                                </ol>
                                <div class="widget-49-meeting-action">
                                    <a href="#" class="btn btn-sm btn-flash-border-primary">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <x-app.footer />
    </main>

</x-app-layout>


<style>
    body {
        background: #F4F7FD;
        margin-top: 20px;
    }

    .card-margin {
        margin-bottom: 1.875rem;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .widget-49 .widget-49-title-wrapper {
        display: flex;
        align-items: center;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #edf1fc;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
        color: #4e73e5;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
        color: #4e73e5;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fcfcfd;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
        color: #dde1e9;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
        color: #dde1e9;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #e8faf8;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
        color: #17d1bd;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
        color: #17d1bd;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebf7ff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
        color: #36afff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
        color: #36afff;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: floralwhite;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
        color: #FFC868;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
        color: #FFC868;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #feeeef;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
        color: #F95062;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
        color: #F95062;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fefeff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
        color: #f7f9fa;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
        color: #f7f9fa;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebedee;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
        color: #394856;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
        color: #394856;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #f0fafb;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
        color: #68CBD7;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
        color: #68CBD7;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
        color: #3c4142;
        font-size: 14px;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
        color: #B1BAC5;
        font-size: 13px;
    }

    .widget-49 .widget-49-meeting-points {
        font-weight: 400;
        font-size: 13px;
        margin-top: .5rem;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
        display: list-item;
        color: #727686;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
        margin-left: .5rem;
    }

    .widget-49 .widget-49-meeting-action {
        text-align: right;
    }

    .widget-49 .widget-49-meeting-action a {
        text-transform: uppercase;
    }
</style>

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <head>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <x-app.navbar />

        <div class="container mt-5">
            <!-- Tab navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ajouter-session-tab" data-toggle="tab" href="#ajouter-session"
                        role="tab" aria-controls="ajouter-session" aria-selected="true">Ajouter une Session</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="afficher-sessions-tab" data-toggle="tab" href="#afficher-sessions"
                        role="tab" aria-controls="afficher-sessions" aria-selected="false">Afficher les Sessions</a>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="myTabContent">
                <!-- Ajouter une Session Tab -->
                <div class="tab-pane fade show active" id="ajouter-session" role="tabpanel"
                    aria-labelledby="ajouter-session-tab">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3>Ajouter une Session</h3>
                        </div>
                        <div class="card-body">
                            <!-- Affichage des messages d'erreur -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('sessions.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nom_ressource">Nom de la ressource</label>
                                    <input type="text" name="nom_ressource" id="nom_ressource" class="form-control"
                                        required value="{{ old('nom_ressource') }}">
                                </div>
                                <div class="form-group">
                                    <label for="type_ressource">Type de ressource</label>
                                    <input type="text" name="type_ressource" id="type_ressource" class="form-control"
                                        required value="{{ old('type_ressource') }}">
                                </div>
                                <div class="form-group">
                                    <label for="datedebut">Date début</label>
                                    <input type="date" name="datedebut" id="datedebut" class="form-control" required
                                        value="{{ old('datedebut') }}">
                                </div>
                                <div class="form-group">
                                    <label for="datefin">Date fin</label>
                                    <input type="date" name="datefin" id="datefin" class="form-control" required
                                        value="{{ old('datefin') }}">
                                </div>
                                <div class="form-group">
                                    <label for="salle">Salle</label>
                                    <input type="number" name="salle" id="salle" class="form-control" required
                                        value="{{ old('salle') }}">
                                </div>
                                <div class="form-group">
                                    <label for="formateur_id">Formateur</label>
                                    <select name="formateur_id" id="formateur_id" class="form-control" required>
                                        @foreach ($formateurs as $formateur)
                                            <option value="{{ $formateur->id }}"
                                                {{ old('formateur_id') == $formateur->id ? 'selected' : '' }}>
                                                {{ $formateur->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formations_id">Formation</label>
                                    <select name="formations_id" id="formations_id" class="form-control" required>
                                        @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}"
                                                {{ old('formations_id') == $formation->id ? 'selected' : '' }}>
                                                {{ $formation->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Afficher les Sessions Tab -->
                <div class="tab-pane fade" id="afficher-sessions" role="tabpanel"
                    aria-labelledby="afficher-sessions-tab">
                    <div class="row mt-3">
                        @foreach ($sessions as $session)
                            <div class="col-lg-4">
                                <div class="card card-margin">
                                    <div class="card-header no-border">
                                        <h5 class="card-title">{{ $session->formation->titre }}</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-primary">
                                                    <span
                                                        class="widget-49-date-day">{{ \Carbon\Carbon::parse($session->datedebut)->translatedFormat('d') }}</span>
                                                    <span
                                                        class="widget-49-date-month">{{ \Carbon\Carbon::parse($session->datedebut)->translatedFormat('F') }}</span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span
                                                        class="widget-49-pro-title">{{ $session->type_ressource }}</span>
                                                    <span
                                                        class="widget-49-meeting-time">{{ \Carbon\Carbon::parse($session->datedebut)->format('H:i') }}
                                                        to
                                                        {{ \Carbon\Carbon::parse($session->datefin)->format('H:i') }}</span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <li class="widget-49-meeting-item">Numero de salle
                                                    :<span>{{ $session->salle }}</span></li>
                                                <li class="widget-49-meeting-item">Formateur
                                                    :<span>{{ $session->formateur->nom }}</span></li>
                                                <li class="widget-49-meeting-item">
                                                    Ressource:<span>{{ $session->nom_ressource }}</span></li>
                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <a href="{{ route('sessions.show', $session->id) }}"
                                                    class="btn btn-sm btn-flash-border-primary">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <x-app.footer />
    </main>
</x-app-layout>



<style>
    body {
        background: url('../assets/img/back-session.jpg') no-repeat center center fixed;
        background-size: cover;
        margin-top: 0px;
    }
    .main-content {
        background: rgba(255, 255, 255, 0.8)  no-repeat center center fixed;
        /* Semi-transparent white background */
        padding: 20px;
        border-radius: 10px;
    }

    .card-margin {
        margin-bottom: 1.875rem;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
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

    .widget-49 .widget-49-meeting-action {
        text-align: right;
    }

    .widget-49 .widget-49-meeting-action a {
        text-transform: uppercase;
    }

    
</style>

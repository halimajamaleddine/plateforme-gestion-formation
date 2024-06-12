<x-app-layout>
    <x-app.navbar titlePage="Reservation" />

    <link rel="stylesheet" href="resources/css/style.css">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">Reservation de ressources</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="btn btn-dark btn-primary">
                                        <i class="fas fa-user-plus me-2"></i> Ajouter des ressources
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert" id="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert" id="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-secondary text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">Nom de ressources </th>
                                        <th class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">Type de ressource </th>
                                        <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">Date debut </th>
                                        <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">Date fin </th>
                                        <th class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">Reservation </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $session)
                                        <tr>
                                            <td class="align-middle bg-transparent border-bottom">{{ $session->nom_ressource }}</td>
                                            <td class="align-middle bg-transparent border-bottom">{{ $session->type_ressource }}</td>
                                            <td class="align-middle bg-transparent border-bottom">{{ $session->datedebut }}</td>
                                            <td class="align-middle bg-transparent border-bottom">{{ $session->datefin }}</td>
                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                <form action="{{ route('inscription.acceptInFormation') }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="session_id" value="{{ $session->id }}">
                                                    @if ($session->disponibilite_ressource == 0)
                                                        <button class="btn bg-success text-white" name="in_formation" value="accepter">Reserver</button>
                                                    @else
                                                        <button class="btn bg-danger text-white" name="in_formation" value="refuser">Libere</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>
<script src="/assets/js/plugins/datatables.js"></script>
<script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true,
        columns: [{
            select: [2, 6],
            sortable: false
        }]
    });

    const check = document.getElementById('Fcheck');
    const btn = document.getElementById('btn');
    const message = document.getElementById('message');

    btn.addEventListener('click', function() {
        btn.classList.add('hide');
        check.classList.add('rotateIn');
        message.classlist.add('fadein');
    });
</script>
<style>
    body {
        background: url('../assets/img/back-reservation.jpg') no-repeat center center fixed;
        background-size: cover;
        margin-top: 0px;
    }

    .btn-a {
        padding: 10px 20px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        z-index: 2;
    }

    .btn-a:hover {
        background: #0056b3;
    }

    .check {
        position: absolute;
        opacity: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #0lad0a;
        color: #fff;
        font-size: 30px;
        border: 1px solid #049117;
    }

    .message {
        opacity: 0;
        font-size: 1.5rem;
    }

    .row {
        transform: translateY(-25px);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hide {
        display: none;
    }

    .rotateIn {
        animation: rotateIn 0.5s forwards;
    }

    .fadeIn {
        animation: fadeIn 1.3s 0.5s forwards;
    }

    @keyframes rotateIn {
        0% {
            opacity: 0;
            scale: 0.5;
            transform: rotate(edeg);
            filter: blur(5px);
        }

        50% {
            pacity: 1;
            scale: 1.2;
        }

        90% {
            opacity: 1;
            scale: 1;
            transform: rotate(360deg);
        }

        100% {
            opacity: 1;
            transform: translatex(-60px);
        }
    }

    keyframes fadeIn % {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<x-app-layout>
    <x-app.navbar titlePage="users management" />
    <link rel="stylesheet" href="resources/css/style.css">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <br>
                                    <h5 class="">Gestion des utilisateurs</h5>
                                    <p class="mb-0 text-sm">
                                        Ici, vous pouvez gérer les utilisateurs.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    {{-- <a href="#" class="btn btn-dark btn-primary">
                                        <i class="fas fa-user-plus me-2"></i> Add Member
                                    </a> --}}
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
                        <br>
                        <!-- Formulaire de sélection des utilisateurs -->
                        <div class="container-fluid border">
                            <form id="filter-form" action="{{ route('users.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="grade-filter">Filtrer par grade</label>
                                        <select name="grade" id="grade-filter" class="form-control">
                                            <option value="">Tous les grades</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade }}"
                                                    {{ request('grade') == $grade ? 'selected' : '' }}>
                                                    {{ $grade }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="etablissement-filter">Filtrer par établissement</label>
                                        <select name="etablissement" id="etablissement-filter" class="form-control">
                                            <option value="">Tous les établissements</option>
                                            @foreach ($etablissements as $etablissement)
                                                <option value="{{ $etablissement }}"
                                                    {{ request('etablissement') == $etablissement ? 'selected' : '' }}>
                                                    {{ $etablissement }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="anciennete-filter">Filtrer par ancienneté</label>
                                        <select name="anciennete" id="anciennete-filter" class="form-control">
                                            <option value="">Toutes les anciennetés</option>
                                            @foreach ($anciennetes as $anciennete)
                                                <option value="{{ $anciennete }}"
                                                    {{ request('anciennete') == $anciennete ? 'selected' : '' }}>
                                                    {{ $anciennete }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Filtrer</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <form id="accept-users-form" action="{{ route('users.acceptSelected') }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                <table class="table text-secondary text-center">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                <input type="checkbox" id="select-all">
                                            </th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                ID</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Nom et prenom</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Mail</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Etablissement</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Anciennete</th>
                                            <th
                                                class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Grade</th>
                                            <th
                                                class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Creation Date</th>
                                            <th
                                                class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Statue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->role === 'admin')
                                                @continue
                                            @endif
                                            <tr>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    <input type="checkbox" name="selected_users[]"
                                                        value="{{ $user->id }}" class="user-checkbox">
                                                </td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->id }}</td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->nom }} {{ $user->prenom }}</td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->email }}</td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->etablissement }}</td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->anciennete }}</td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    {{ $user->grade }}</td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    16/08/18</td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    @if ($user->in_formation)
                                                        <span class="badge bg-success">Accepté</span>
                                                    @else
                                                        <span class="badge bg-danger">Refusé</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-primary" id="accept-selected-btn">Accepter les
                                    utilisateurs sélectionnés</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>

<script src="/assets/js/plugins/datatables.js"></script>
<script>
    document.getElementById('select-all').addEventListener('click', function(event) {
        const isChecked = event.target.checked;
        document.querySelectorAll('.user-checkbox').forEach(checkbox => {
            checkbox.checked = isChecked;
        });
    });

    document.getElementById('accept-selected-btn').addEventListener('click', function() {
        document.getElementById('accept-users-form').submit();
    }); <
    /

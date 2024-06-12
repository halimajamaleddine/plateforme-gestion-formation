<x-app-layout>
    <x-app.navbar titlePage="Profile" />


    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="pt-7 pb-6 bg-cover"
            style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;">
        </div>
        <div class="container">
            <div class="card card-body py-2 bg-transparent shadow-none">
                <div class="row">
                    <div class="col-auto">
                        <div
                            class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
                            <img src="../assets/img/team-2.jpg" alt="profile_image" class="w-100">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h3 class="mb-0 font-weight-bold">
                                {{ auth()->user()->nom }} {{ auth()->user()->prenom }}
                            </h3>
                            <p class="mb-0">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                        <a href="javascript:;" class="btn btn-sm btn-white">Cancel</a>
                        <a href="javascript:;" class="btn btn-sm btn-dark">Save</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- session POST --}}
        <div class="container my-3 py-3">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-xs border mb-4 pb-3">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0 font-weight-semibold text-lg">Dernière publication</h6>
                            <p class="text-sm mb-1">ici vous pouvez trouver les dernière publication.</p>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <!-- Liste des formations -->
                                @foreach ($formations as $formation)
                                    <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
                                        <div
                                            class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                                            <div class="full-background bg-cover"
                                                style="background-image: url('{{ asset('storage/' . $formation->fichier) }}')">
                                            </div>
                                            <span class="mask bg-dark opacity-1 border-radius-sm"></span>
                                            <div class="card-body text-start p-3 w-100">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                                                            <div class="w-50">
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $formation->date }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $formation->id }}">
                                            <h4 class="font-weight-semibold">{{ $formation->titre }}</h4>
                                        </a>
                                        <p class="mb-4">{{ $formation->objectif }}</p>
                                        <a href="javascript:;"
                                            class="text-dark font-weight-semibold icon-move-right mt-auto w-100 mb-5"
                                            data-bs-toggle="modal" data-bs-target="#editModal-{{ $formation->id }}">
                                            Modifier le post
                                            <i class="fas fa-arrow-right-long text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <!-- Modal d'édition -->
                                    <div class="modal fade" id="editModal-{{ $formation->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel-{{ $formation->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel-{{ $formation->id }}">
                                                        Modifier la formation</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('posts.update', $formation->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3 row justify-content-center">
                                                            <div class="col-lg-9 col-2">
                                                                <div class="card" id="basic-info">
                                                                    <div class="pt-0 card-body">
                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <label
                                                                                    for="titre-{{ $formation->id }}">Titre
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="titre"
                                                                                    id="titre-{{ $formation->id }}"
                                                                                    value="{{ $formation->titre }}"
                                                                                    class="form-control">
                                                                                @error('titre')
                                                                                    <span
                                                                                        class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <label
                                                                                    for="objectif-{{ $formation->id }}">Objectif
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="objectif"
                                                                                    id="objectif-{{ $formation->id }}"
                                                                                    value="{{ $formation->objectif }}"
                                                                                    class="form-control">
                                                                                @error('objectif')
                                                                                    <span
                                                                                        class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <label
                                                                                    for="contenu-{{ $formation->id }}">Contenu
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <textarea name="contenu" id="contenu-{{ $formation->id }}" class="form-control" rows="5">{{ $formation->contenu }}</textarea>
                                                                                @error('contenu')
                                                                                    <span
                                                                                        class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <label
                                                                                    for="formateur_id-{{ $formation->id }}">Formateur
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <select name="formateur_id"
                                                                                    id="formateur_id-{{ $formation->id }}"
                                                                                    class="form-control">
                                                                                    @foreach ($formateurs as $formateur)
                                                                                        <option
                                                                                            value="{{ $formateur->id }}"
                                                                                            {{ $formation->formateur_id == $formateur->id ? 'selected' : '' }}>
                                                                                            {{ $formateur->nom }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('formateur_id')
                                                                                    <span
                                                                                        class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-10">
                                                                                <label
                                                                                    for="fichier-{{ $formation->id }}">Fichier</label>
                                                                                <input type="file" name="fichier"
                                                                                    id="fichier-{{ $formation->id }}"
                                                                                    class="form-control">
                                                                                @if ($formation->fichier)
                                                                                    <p>Current File: <a
                                                                                            href="{{ asset('storage/' . $formation->fichier) }}"
                                                                                            target="_blank">{{ $formation->fichier }}</a>
                                                                                    </p>
                                                                                @endif
                                                                                @error('fichier')
                                                                                    <span
                                                                                        class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary">Mettre à
                                                                jour</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Ajouter une publication de formation --}}
                                <div class="col-xl-4 col-md-6 mb-xl-0 mb-4" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <div class="card h-100 card-plain border border-dashed px-5">
                                        <div class="card-body d-flex flex-column justify-content-center text-center">
                                            <a href="javascript:;">
                                                <div
                                                    class="icon icon-shape bg-dark text-center text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="19"
                                                        width="19" viewBox="0 0 24 24" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <h5 class="text-dark text-lg">Créer une nouvelle publication </h5>
                                                <p class="text-sm text-secondary mb-0">Conduisez dans l’éditeur et
                                                    ajoutez
                                                    votre contenu.</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un formateur</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('formations.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 row justify-content-center">
                                        <div class="col-lg-9 col-2 ">
                                            <div class="card " id="basic-info">
                                                <div class="pt-0 card-body">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="titre">Titre <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="titre" id="titre"
                                                                placeholder="Titre de la formation"
                                                                class="form-control">
                                                            @error('titre')
                                                                <span
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="objectif">Objectif <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="objectif" id="objectif"
                                                                placeholder="Objectif de la formation"
                                                                class="form-control">
                                                            @error('objectif')
                                                                <span
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="contenu">Contenu <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="contenu" id="contenu" class="form-control" rows="5" placeholder="Contenu de la formation"></textarea>
                                                            @error('contenu')
                                                                <span
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="formateur_id">Formateur <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="formateur_id" id="formateur_id"
                                                                class="form-control">
                                                                @foreach ($formateurs as $formateur)
                                                                    <option value="{{ $formateur->id }}">
                                                                        {{ $formateur->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('formateur_id')
                                                                <span
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <label for="fichier">Fichier</label>
                                                            <input type="file" name="fichier" id="fichier"
                                                                class="form-control">
                                                            @error('fichier')
                                                                <span
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- fin modal --}}
            </div>
        </div>
    </div>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"></i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Corporate UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100" target="_blank"
                    href="https://www.creative-tim.com/product/corporate-ui-dashboard-laravel">Free Download</a>
                <a class="btn btn-outline-dark w-100" target="_blank"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/installation-guide/corporate-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/corporate-ui-dashboard"
                        target="_blank" data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/corporate-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Corporate%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fcorporate-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/corporate-ui-dashboard-laravel"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.col-6').addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        });
    });
</script>

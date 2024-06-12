<x-app-layout>
    <x-app.navbar titlePage="Formateur management" />

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="card">
                <div class="pb-0 card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="">Formateur Management</h5>
                            <p class="mb-0 text-sm">
                                Ici, vous pouvez gérer les formateurs.
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"> Ajouter un formateur</button>
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
                                        <form action="{{ route('Ajouter.formateur') }}" method="POST">
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
                                            <div class="mb-3 row justify-content-center">
                                                <div class="col-lg-9 col-2 ">
                                                    <div class="card " id="basic-info">
                                                        <div class="pt-0 card-body">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <label for="Nom">Nom <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="nom" id="nom"
                                                                        placeholder="Nom de formateur"
                                                                        class="form-control">
                                                                    @error('nom')
                                                                        <span
                                                                            class="text-danger text-sm">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <label for="prenom">Prenom <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="prenom" id="prenom"
                                                                        placeholder="prenom" class="form-control">
                                                                    @error('prenom')
                                                                        <span
                                                                            class="text-danger text-sm">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <label for="statue">Statue <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="statue" id="statue"
                                                                        placeholder="statue" class="form-control">
                                                                    @error('statue')
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
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" onclick="this.form.submit()"
                                                    data-bs-dismiss="modal" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- fin modal --}}
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
                            <div class="a<lert alert-danger" role="alert" id="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-secondary text-center">
                        <thead>
                            <tr>
                                <th
                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Nom</th>
                                <th
                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Prenom</th>
                                <th
                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Statue</th>
                                <th
                                    class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formateurs as $formateur)
                                <tr>
                                    <td class="align-middle bg-transparent border-bottom">{{ $formateur->nom }}
                                    </td>
                                    <td class="align-middle bg-transparent border-bottom">{{ $formateur->prenom }}
                                    </td>
                                    <td class="text-center align-middle bg-transparent border-bottom">
                                        {{ $formateur->statue }}
                                    </td>
                                    <td class=" align-middle bg-transparent border-bottom">
                                        <a href="{{ route('formateurs.edit', $formateur) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="" method="">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-primary bg-danger"> Supprimer </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <x-app.footer />
    </main>

</x-app-layout>
<style>
     body {
        background: url('../assets/img/back-user.jpg') no-repeat center center fixed;
        background-size: cover;
        margin-top: 0px;
    }
</style>

<x-app-layout>
    <x-app.navbar titlePage="Formateur edit" />

    <head>
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <form action="{{ route('formateurs.update', $formateur) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row justify-content-center">
                    <div class="col-lg-9 col-2 ">
                        <div class="card " id="basic-info">
                            <div class="pt-0 card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="Nom">Nom <span class="text-danger">*</span></label>
                                        <input type="text" name="nom" id="nom"
                                            value='{{ $formateur->nom }}' placeholder="Nom de formateur"
                                            class="form-control">
                                        @error('nom')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <label for="prenom">Prenom <span class="text-danger">*</span></label>
                                        <input type="text" name="prenom" id="prenom" placeholder="prenom"
                                            value='{{ $formateur->prenom }}' class="form-control">
                                        @error('prenom')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <label for="statue">Statue <span class="text-danger">*</span></label>
                                        <input type="text" name="statue" id="statue" placeholder="statue"
                                            value='{{ $formateur->statue }}' class="form-control">
                                        @error('statue')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="this.form.submit()" data-bs-dismiss="modal"
                        class="btn btn-primary">Modfier</button>
                </div>
            </form>

        </div>
        
    </main>
</x-app-layout>

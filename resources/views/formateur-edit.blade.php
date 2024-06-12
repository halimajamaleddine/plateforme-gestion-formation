<head>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

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
                                <input type="text" name="nom" id="nom" value='{{ $formateur->nom }}'
                                    placeholder="Nom de formateur" class="form-control">
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
</style>

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="px-5 py-4 container-fluid">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="pb-0 card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class=""> Impression d'attestation </h5>
                                        <p class="mb-0 text-sm">
                                            Vous pouvez imprimer l’attestation ici.
                                        </p>
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
                            <form id="printForm" action="{{ route('attestation.bulk') }}" method="POST">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table text-secondary text-center">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                    <input type="checkbox" id="selectAll" />
                                                </th>
                                                <th
                                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                    ID</th>
                                                <th
                                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                    Name</th>
                                                <th
                                                    class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                    Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                @if ($user->role === 'admin')
                                                    @continue
                                                @endif
                                                <tr>
                                                    <td class="align-middle bg-transparent border-bottom">
                                                        <input type="checkbox" name="userids[]" value="{{ $user->id }}">
                                                    </td>
                                                    <td class="align-middle bg-transparent border-bottom">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td class="align-middle bg-transparent border-bottom">
                                                        {{ $user->nom }}
                                                    </td>
                                                    <td class="align-middle bg-transparent border-bottom">
                                                        {{ $user->email }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn bg-success text-white">Imprimer Sélection</button>
                                </div>
                            </form>
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
        background: url('../assets/img/back-user.jpg') no-repeat center center fixed;
        background-size: cover;
        margin-top: 0px;
    }
</style>

<script>
    document.getElementById('selectAll').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('input[name="userids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = event.target.checked;
        });
    });
</script>

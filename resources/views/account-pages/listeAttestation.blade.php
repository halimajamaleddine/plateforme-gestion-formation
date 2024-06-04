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
                                    {{-- <div class="col-6 text-end">
                                        <a href="#" class="btn btn-dark btn-primary">
                                            <i class="fas fa-user-plus me-2"></i> Add Member
                                        </a>
                                    </div> --}}
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
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                ID</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Name</th>
                                            <th
                                                class="text-left text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Email</th>

                                            <th
                                                class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                                Imprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->role === 'admin')
                                                @continue
                                            @endif
                                            <tr>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->id }}
                                                </td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->nom }}
                                                </td>
                                                <td class="align-middle bg-transparent border-bottom">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="text-center align-middle bg-transparent border-bottom">
                                                    <form action="{{ route('attestation', $user->id) }}" method="get">
                                                        @csrf
                                                        <input type="hidden" name="userid"
                                                            value="{{ $user->id }}">
                                                        <button onclick="printAttestation('{{ $user->id }}')"
                                                            class="btn bg-success text-white"
                                                            name="imprimer">Imprimer</button>
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

        </div>
        <x-app.footer />
    </main>

</x-app-layout>

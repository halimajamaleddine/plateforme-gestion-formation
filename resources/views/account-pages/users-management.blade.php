<x-app-layout>
    <link rel="stylesheet" href="resources/css/style.css">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="mt-4 row">
                <div class="col-12">
                    <div class="alert alert-dark text-sm" role="alert">
                        <strong>Add, Edit, Delete features are not functional!</strong> This is a
                        <strong>PRO</strong> feature ! Click <a href="#" target="_blank" class="text-bold">here</a>
                        to see the <strong>PRO</strong> product!
                    </div>
                    <div class="card">
                        <div class="pb-0 card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="">User Management</h5>
                                    <p class="mb-0 text-sm">
                                        Here you can manage users.
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="btn btn-dark btn-primary">
                                        <i class="fas fa-user-plus me-2"></i> Add Member
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
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Creation Date</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            statue</th>
                                        <th
                                            class="text-center text-uppercase font-weight-bold bg-transparent border-bottom text-secondary">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle bg-transparent border-bottom">{{ $user->id }}
                                            </td>
                                            <td class="align-middle bg-transparent border-bottom">{{ $user->nom }}
                                            </td>
                                            <td class="align-middle bg-transparent border-bottom">{{ $user->email }}
                                            </td>
                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                {{ $user->role }}</td>
                                            <td class="text-center align-middle bg-transparent border-bottom">16/08/18
                                            </td>

                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                <form action="{{ route('inscription.acceptInFormation', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="userid" value={{ $user->id }}>
                                                    <button class="btn bg-success text-white" name="in_formation"
                                                        value="accepter" onclick="this.form.submit()"
                                                        @if ($user->in_formation) disabled @endif>Accepte</button>
                                                    <button class="btn bg-danger text-white" name="in_formation"
                                                        value="refuser" onclick="this.form.submit()"
                                                        @if ($user->in_formation === false) disabled @endif>Refuser</button>
                                                </form>
                                            </td>

                                            <td class="text-center align-middle bg-transparent border-bottom">
                                                <a href="#"><i class="fas fa-user-edit"
                                                        aria-hidden="true"></i></a>
                                                <a href="#"><i class="fas fa-trash" aria-hidden="true"></i></a>
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

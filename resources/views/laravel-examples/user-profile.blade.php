<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid ">
            <form action={{ route('users.update', Auth::user()->id) }} method="POST">
                @csrf
                @method('PUT')
                <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <div class="card card-body" id="profile">
                            <img src="../../../assets/img/bg1.jpg" alt="pattern-lines"
                                class="top-0 rounded-2 position-absolute start-0 w-100 h-100">

                            <div class="row z-index-2 justify-content-center align-items-center">
                                <div class="col-sm-auto col-4">
                                    <div class="avatar avatar-xl position-relative">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            {{ auth()->user()->name }}
                                        </h5>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                                    
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
                <div class="mb-5 row justify-content-center">
                    <div class="col-lg-9 col-12 ">
                        <div class="card " id="basic-info">
                            <div class="card-header">
                                <h5>S'inscrire dans une formation</h5>
                            </div>
                            <div class="pt-0 card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <label for="nom">Nom <span class="text-danger">*</span></label>
                                        <input type="text" name="nom" id="nom"
                                            value="{{ old('nom', auth()->user()->nom) }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="prenom">Prénom <span class="text-danger">*</span></label>
                                        <input type="text" name="prenom" id="prenom"
                                            value="{{ old('prenom', auth()->user()->prenom) }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="etablissement">Etablissement <span class="text-danger">*</span></label>
                                        <select name="etablissement" id="etablissement" placeholder="Etablissement"
                                            class="form-control">
                                            <option value="EMI">EMI</option>
                                            <option value="ENS">ENS</option>
                                            <option value="ENSAM">ENSAM</option>
                                            <option value="ENSIAS">ENSIAS</option>
                                            <option value="EST-salé">EST-salé</option>
                                            <option value="FLSH">FLSH</option>
                                            <option value="FMD">FMD</option>
                                            <option value="FMP">FMP</option>
                                            <option value="FSE">FSE</option>
                                            <option value="FSR">FSR</option>
                                            <option value="FSJES-AGDAL">FSJES-AGDAL</option>
                                            <option value="FSJES-salé">FSJES-salé</option>
                                            <option value="FSJES-souissi">FSJES-souissi</option>
                                        </select>
                                        @error('etablissement')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="ancienneté">Ancienneté dans l'enseignement <span class="text-danger">*</span></label>
                                        <select name="ancienneté" id="ancienneté"
                                            value="ancienneté" class="form-control">
                                            <option value="1-4">1-4 ans </option>
                                            <option value="5-12">5-12 ans</option>
                                            <option value="+12">+12 ans</option>

                                        </select>
                                        @error('ancienneté')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', auth()->user()->email) }}"
                                            class="form-control">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="telephone">Telephone  <span class="text-danger">*</span></label>
                                        <input type="text" name="telephone" id="telephone" placeholder="+212"
                                            value="{{ old('phone', auth()->user()->phone) }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <label for="grade">Grade <span class="text-danger">*</span></label>
                                    <select name="grade" id="grade" rows="2" class="form-control">
                                        <option value="A">Grade - A</option>
                                        <option value="B">Grade - B</option>
                                        <option value="C">Grade - C</option>

                                    </select>
                                    @error('motivations')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row p-2">
                                    <label for="motivations">Motivations <span class="text-danger">*</span></label>
                                    <textarea name="motivations" id="motivations" rows="2" class="form-control"></textarea>
                                    @error('motivations')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <x-app.footer />
        </div>
    </main>

</x-app-layout>

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            {{-- formulaire d'inscription --}}
            <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                @csrf
                @method('put')
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
                                        <label for="etablissement">Etablissement <span
                                                class="text-danger">*</span></label>
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
                                        <label for="anciennete">Ancienneté dans l'enseignement <span
                                                class="text-danger">*</span></label>
                                        <select name="anciennete" id="anciennete" value="anciennete"
                                            class="form-control">
                                            <option value="1-4">1-4 ans </option>
                                            <option value="5-12">5-12 ans</option>
                                            <option value="+12">+12 ans</option>

                                        </select>
                                        @error('anciennete')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="telephone">Telephone <span class="text-danger">*</span></label>
                                        <input type="text" name="telephone" id="telephone" placeholder="+212"
                                            value="{{ old('phone', auth()->user()->phone) }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
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
                                </div>
                                <div class="row p-2">
                                    <label for="formation_id">Formation <span class="text-danger">*</span></label>
                                    <select name="formation_id" id="formation_id" rows="2" class="form-control">
                                        @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                        @endforeach
                                    </select>
                                    @error('formation')
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
                                <button type="submit"
                                    class="mt-6 mb-0 btn btn-white btn-sm float-end">S'inscrire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <x-app.footer />
    </main>

</x-app-layout>

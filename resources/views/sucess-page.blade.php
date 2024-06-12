<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid">
            <div class="container mt-5">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <x-app.footer />
    </main>

</x-app-layout>
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


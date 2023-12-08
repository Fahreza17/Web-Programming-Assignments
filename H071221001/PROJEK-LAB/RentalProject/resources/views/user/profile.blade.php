@extends('user.main')

@section('content')
<style>
    .card {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: rgba(0, 123, 255, 0.8);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }
</style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Profile</h2>
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

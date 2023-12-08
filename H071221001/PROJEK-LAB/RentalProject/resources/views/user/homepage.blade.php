@extends('user.main')
@section('content')
<style>
     body {
            background-image: url('/img/bg2.jpeg');
            background-color: rgb(217, 205, 190);
            background-size: cover;
            background-attachment: fixed;
        }
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

    header {
        background-color: rgba(118, 118, 118, 0.5);
        padding: 20px;
    }
</style>
    <header class="">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Rental Mobil</h1>
                    <form class="d-flex align-items-center mt-3" role="search" action="{{ route('user.search') }}" method="GET">
                        <input class="form-control me-3" type="search" name="search" placeholder="Search Product"
                            aria-label="Search">
                        <button class="btn me-5" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #fff">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </form>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 class="text-center mb-5" style="color:white; background-color: rgb(113, 94, 68);
            border-radius: 3em;">Daftar Mobil</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($cars as $car)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                style="top: 0; right: 0">
                                {{ $car->status }}
                            </div>
                            <h3 class="fw-bolder">{{ $car->nama_mobil }}</h3>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}"
                                width="200" height="200" />
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    @if ($car->status == 'tersedia')
                                        <a class="btn btn-primary mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}">Sewa</a>
                                    @else
                                        <button class="btn btn-secondary mt-auto" disabled>Sewa</button>
                                    @endif
                                    <a class="btn btn-info mt-auto text-white" href="{{ route('user.detail', $car->slug) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

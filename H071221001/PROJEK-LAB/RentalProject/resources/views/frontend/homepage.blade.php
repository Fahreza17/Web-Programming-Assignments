@extends('layouts.frontend')
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

        header {
            background-color: rgb(113, 94, 68);
            border-radius: 7em;
            padding: 10px;
        }

        .colored-text {
        color: #e8e6e6; 
        background-color: #000000;
        padding: 30px; 
        display: inline-block; 
        border-radius: 50px;
        }

        div#button-order{
        position: relative;
        margin: 3rem auto 1.5rem auto;
        text-align: center;
        }

        div#button-order a{ 
        text-decoration: none;
        display: inline-block;
        padding: 0.1em 0.5em 0.3em 0.5em;
        border-radius: 3em;
        cursor: pointer;
        font-size: 1.78em;
        font-weight: 700;
        text-align: center;
        text-shadow: 0 0.02em 0.04em rgba(0,0,0,.4);
        color: var(--white);
        background-color: rgb(113, 94, 68);
        background-image: linear-gradient(orange, #ff8800);
        }

    </style>
    <header class="">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Rental Mobil</h1>
                {{-- <img src="img/logo1.png" alt="Logo" style="width: 300px; height: 200px;">  --}}
                <p class="lead fw-normal text-white-50 mb-0">
                    Pilihan Terbaik Rental Mobil, Tarif Murah, Layanan Prima, Armada Lengkap dan Bersih, Driver Terpercaya. <br>
                    Hubungi Kami di 0812 3456 7890
                </p>
            </div>
        </div>
    </header>
    <div id="button-order">
        <a href="{{ route('login') }}">RENT NOW FOR THE BEST RATES!!</a>
    </div>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            @if (count($cars) > 0)
            {{-- <h1 class="text-center mb-5" style="color: rgb(0, 0, 0)">Yang Kami Sediakan</h1> --}}
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                    <!-- Carousel Indicators -->
                                    <div class="carousel-indicators">
                                      @foreach ($cars as $key => $car)
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                                      @endforeach
                                    </div>
                                  
                                    <!-- Carousel Inner -->
                                    <div class="carousel-inner">
                                      @foreach ($cars as $key => $car)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                          <img src="{{ Storage::url($car->gambar) }}" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                            <h1><span class="colored-text">{{ $car->nama_mobil }}</span></h1>
                                            <!-- Anda bisa tambahkan deskripsi atau informasi lainnya di sini -->
                                          </div>
                                        </div>
                                      @endforeach
                                    </div>
                                  
                                    <!-- Carousel Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                                
                    {{-- @endforeach --}}
                </div>
            @else
                <div class="text-center">
                    <p class="lead fw-normal text-white mt-5">Maaf, saat ini tidak ada mobil yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

<!DOCTYPE html>
<html>
  <head> 
    @include('dokter.css')
  </head>
  <body>
    
        @include('dokter.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('dokter.sidebar')

      <!-- Sidebar Navigation end-->

      <div class="container-fluid page-body-wrapper">

        {{-- @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
          </div>
        @endif --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                
                {{-- Akses data dokter --}}
                @if(session('doctor'))
                    <div>
                        Informasi Dokter:
                        <ul>
                            <li>Nama: {{ session('doctor')->name }}</li>
                            <li>Email: {{ session('doctor')->email }}</li>
                            {{-- Tambahkan detail dokter lainnya sesuai kebutuhan --}}
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <div class="container d-flex justify-content-center ">
          <!-- Contoh formulir -->
          <form action="{{ route('upload.appointment') }}" method="post">
            @csrf
            @method('POST')

            <!-- Field untuk memilih pasien -->
            <label for="patient_id">Pilih Pasien:</label>
            <select name="patient_id" required>
                @foreach ($pasien as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
            <br>
            <!-- Field untuk memasukkan keluhan pasien -->
            <label for="patient_complaints">Keluhan Pasien:</label>
            <textarea name="patient_complaints" required></textarea>
            <br>
            <!-- Field untuk memilih status -->
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="menunggu">Menunggu</option>
                <option value="sedang konsultasi">Sedang Konsultasi</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <br>
            <!-- Field untuk memasukkan nomor antrian -->
            <label for="queue_number">Nomor Antrian:</label>
            <input type="text" name="queue_number" />
            <br>
            <!-- Field untuk memilih tanggal jadwal temu -->
            <label for="appointment_date">Tanggal Jadwal Temu:</label>
            <input type="datetime-local" name="appointment_date" required>
            <br>
            <button type="submit">Buat Jadwal Temu</button>
          </form>

        </div>

      </div>

      @include('dokter.footer')
    
  </body>
</html>
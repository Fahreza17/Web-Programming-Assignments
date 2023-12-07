<!DOCTYPE html>
<html>
  <head> 
    @include('dokter.css')
    <style>
        .button {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid #e66767;
  background-color: #a83a3a;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #e66767;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 30px;
  stroke: #fff;
}

.button:hover {
  background: #a83a3a;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #e66767;
}

.button:active {
  border: 1px solid #a83a3a;
}

    </style>
  </head>
  <body>
    
        @include('dokter.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('dokter.sidebar')

      <!-- Sidebar Navigation end-->
      
      <div class="container" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
        <div> 
            <a href="{{ url('tambah_appointment') }}">
                <button type="button" class="button">
                    <span class="button__text">Add Item</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                </button>
            </a>              
        </div>
        <div align="center" style="padding:155px;">
            <table>
                <tr style="background-color:aliceblue;">
                    <th style="padding:10px">Pasien</th>
                      <th style="padding:10px">Dokter</th>
                      <th style="padding:10px">Keluhan</th>
                      <th style="padding:10px">Status</th>
                      <th style="padding:10px">Nomor Antrian</th>
                      <th style="padding:10px">Tanggal Temu</th>
                      <th style="padding:10px">Aksi</th>
                </tr>

                @foreach ($appointment as $appointment)
                <tr align="center" style="background-color:aliceblue;">
                    <td>{{ $appointment->pasien->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->patient_complaints }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>{{ $appointment->queue_number }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                </tr>
                
                @endforeach
              
          </table>
            {{ $appointment->links() }}
        </div>
      </div>
  </div>

      @include('dokter.footer')
    
  </body>
</html>
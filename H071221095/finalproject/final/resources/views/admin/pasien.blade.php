<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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
    
        @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')
<div style="display:flex;justify-content:center;margin-top:2rem;margin-left:8rem;">
    <a href="{{url("tambah_pasien")}}">
        <button type="button" class="button">
            <span class="button__text">Add Item</span>
            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
        </button>
    </a>
</div>
        <div align="center" style="padding:155px;">

            <table>
                <tr style="background-color:aliceblue;">
                    <th style="padding:10px">name</th>
                    <th style="padding:10px">gender</th>
                    <th style="padding:10px">origin</th>
                    <th style="padding:10px">birth</th>
                    <th style="padding:10px">treatment</th>
                    <th style="padding:10px">phone</th>
                    <th style="padding:10px">image</th>
                </tr>

                @foreach($pasien as $appoint)
                
                <tr align="center" style="background-color:aliceblue;">
                    <td>{{$appoint->name}}</td>
                    <td>{{$appoint->gender}}</td>
                    <td>{{$appoint->origin}}</td>
                    <td>{{$appoint->birth}}</td>
                    <td>{{$appoint->treatment}}</td>
                    <td>{{$appoint->phone}}</td>
                    <td>{{$appoint->image}}</td>
                </tr>

                @endforeach

            </table>
        </div>

      <!-- Sidebar Navigation end-->

      @include('admin.footer')

  </body>
</html>
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    
        @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->

      <div class="container-fluid page-body-wrapper">

        @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <div class="container d-flex justify-content-center ">
          <form action="{{ route('upload.doctor') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="name" style="color: #001B79">
                <label for="name" class="form__label">Name</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="phone" style="color: #001B79">
                <label for="name" class="form__label">Phone Number</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <select name="spesialis" id="spesialis">
                  <option selected>--Select--</option>
                  <option value="jantung">Jantung</option>
                  <option value="bedah">Bedah</option>
                  <option value="tht">THT</option>
                </select>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="room" style="color: #001B79">
                <label for="name" class="form__label">Room Number</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="file" name="image">
              </div>
            </div>
            <div class="doctorname mt-5">   
              <button type="submit" class="button">
                <span class="button__text">Add Item</span>
                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
              </button>
            </div>

          </form>
        </div>

      </div>

      @include('admin.footer')
    
  </body>
</html>
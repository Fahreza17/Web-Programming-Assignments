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

        <div class="container d-flex justify-content-center align-items-center mb-5 pb-5">
          <form action="{{ route('upload.pasien') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="name" style="color: #001B79">
                <label for="name" class="form__label">Name</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="gender" style="color: #001B79">
                <label for="name" class="form__label">Gender</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="origin" style="color: #001B79">
                <label for="name" class="form__label">Origin</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="date" class="form__field" placeholder="Name" required="" name="birth" style="color: #001B79">
                <label for="name" class="form__label">Birth Date</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="year" style="color: #001B79">
                <label for="name" class="form__label">Age</label>
              </div>
            </div>
            <div class="doctorname mt-5">
              <div class="form__group field">
                <input type="input" class="form__field" placeholder="Name" required="" name="treatment" style="color: #001B79">
                <label for="name" class="form__label">Treatment</label>
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
    </div>

      @include('admin.footer')
    
  </body>
</html>
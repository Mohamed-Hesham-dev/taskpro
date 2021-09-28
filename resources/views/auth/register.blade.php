@include('dashboard.header')
<body class="vertical-layout vertical-content-menu 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-content-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="{{asset("admin/app-assets/images/logo/logo-dark.png")}}" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Easily Using</span>
                  </h6>
                </div>
                <div class="card-content">
              
                 
                  <div class="card-body pt-0">
                    <form  class="form-horizontal" method="POST" action="{{ route('register') }}">
                      @csrf
                        <fieldset class="form-group floating-label-form-group">
                          <label for="name" :value="__('Name')">User Name</label>
                          <input type="text" class="form-control" id="name" name="name" :value="old('name')" required autofocus placeholder="User Name">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label  for="email" :value="__('Email')">Your Email Address</label>
                          <input type="email" class="form-control" id="email" name="email" :value="old('email')" required placeholder="Your Email Address">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group mb-1">
                          <label for="password" :value="__('Password')">Enter Password</label>
                          <input type="password" class="form-control" 
                          name="password"
                          required autocomplete="new-password" placeholder="Enter Password">
                        </fieldset>
                     
                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-user"></i> Register</button>
                      </form>
                  </div>
                  <div class="card-body pt-0">
                    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
 @include('dashboard.footer')
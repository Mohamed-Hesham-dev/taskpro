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
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="{{asset("admin/app-assets/images/logo/logo-dark.png")}}" alt="branding logo">
                    </div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body pt-0">
                    <form class="form-horizontal" method="post" action="{{route('login')}}">
                      {{ csrf_field() }}
                        <fieldset class="form-group floating-label-form-group">
                          <label for="user-name">Your Email</label>
                          <input type="email" name="email"  class="form-control"  placeholder="Your Email">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group mb-1">
                          <label for="user-password">Enter Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </fieldset>
                       
                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                      </form>
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                    <span>New to Modern ?</span>
                  </p>
                  <div class="card-body">
                    <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="ft-user"></i> Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  @include('dashboard.footer')
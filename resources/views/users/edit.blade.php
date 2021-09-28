@extends('dashboard.index')

@section('content')

<section id="ordering">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                     <form action="{{route('myAccount.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data" id="fo1">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Name:</label>
                               <input type="text" class="form-control " style="border-radius:20px" name="name" placeholder="Name"  value="{{Auth::user()->name}}">
                    
                            </div>
                         <div class="form-group">
                                <label>Email:</label>
                               <input type="email" class="form-control  " style="border-radius:20px"  name="email" placeholder="Email"  value="{{Auth::user()->email}}">
                    
                            </div>
                            
                            
                           
                         <button style="border-radius:20px"  class="btn btn-primary float-right m-2" type="submit"><i class="fas fa-update" > Update</i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection









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
                     <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" id="fo1">
                        {{ csrf_field() }}
                    
                            <div class="form-group">
                                <label>Name:</label>
                               <input type="text" class="form-control " style="border-radius:20px" name="name" placeholder="Name" value="{{old('name')}}">
                               <span style="color:red;"> {{$errors->first('name')}} </span>
                            </div>
                         <div class="form-group">
                                <label>Quantity:</label>
                               <input type="text" class="form-control  " style="border-radius:20px"  name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                               <span style="color:red;"> {{$errors->first('quantity')}} </span>
                            </div>
                            
                            <div class="form-group">
                                <label>Notes:</label>
                               <textarea type="text"   class="form-control  " style="border-radius:20px"    name="notes" placeholder="notes" >{{old('notes')}}</textarea>
                               <span style="color:red;"> {{$errors->first('notes')}} </span>
                            </div>
                           
                         <button style="border-radius:20px"  class="btn btn-primary float-right m-2" type="submit"><i class="fas fa-save" > Save</i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection









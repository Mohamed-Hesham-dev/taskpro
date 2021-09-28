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
                     <form action="{{route('districts.store')}}" method="post" enctype="multipart/form-data" id="fo1">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label>City_name:</label>
                              <select  name="gouverne_id" class="form-control col-4" style="border-radius:20px">
                                <option></option>
                              @foreach($gouvernes as $gouverne)
                               <option style="border-radius:10px" value="{{$gouverne->id}}" @if(old('gouverne_id')==$gouverne->id) selected @endif>{{$gouverne->name}}</option>
                              @endforeach
                            </select>
                            <span style="color:red;"> {{$errors->first('gouverne_id')}} </span>
                          </div>
                            <div class="form-group">
                                <label>District_name:</label>
                               <input type="text" class="form-control " style="border-radius:20px" name="name" placeholder="Name" value="{{old('name')}}">
                               <span style="color:red;"> {{$errors->first('name')}} </span>
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









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
                     <form action="{{route('branches.store')}}" method="post" enctype="multipart/form-data" id="fo1">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label>City_name:</label>
                              <select id="gouvern_id" name="gouverne_id" class="form-control col-4" style="border-radius:20px">
                                <option></option>
                              @foreach($gouvernes as $gouverne)
                               <option style="border-radius:10px" value="{{$gouverne->id}}" @if(old('gouverne_id')==$gouverne->id) selected @endif}}>{{$gouverne->name}}</option>
                              @endforeach
                            </select>
                            <span style="color:red;"> {{$errors->first('gouverne_id')}} </span>
            
                          </div>


                          <div class="form-group">
                          <div id="district_div" class="form-group col-12 d-none">
                            <label>District_name:</label>

                            <select style="border-radius:25px" class="form-control col-4" id="district_dd" tobetranslated="Related" name="district_id"
                                class="form-control select"  tabindex="null">

                            </select>
                            <span style="color:red;"> {{$errors->first('district_id')}} </span>
                        </div>
                          </div>
                         
                            <div class="form-group">
                                <label>Branch_name:</label>
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




<script>
   jQuery(document).ready(function(){
        $('#gouvern_id').on('change', function() {
          var idGouvern = this.value;
          $('#district_dd').html('');
          $.ajax({
              url: "{{ url('fetch-districts') }}",
              type: "GET",
              data: {
                gouverne_id: idGouvern,
                 
              },
              dataType: 'json',
              success: function(result) {
                console.log(result.districts);
                  if (result.districts.length != 0) {
                      $('#district_div').removeClass('d-none');
                      $('#district_dd').html('<option style="border-radius:10px" value="">Select District</option>');
                      $.each(result.districts, function(key, value) {
                          $("#district_dd").append(`<option style="border-radius:10px" value="${value.id}">${value.name}  </option>`);
                      });
                  } else {
                      $('#district_div').addClass('d-none');
                     
                  }



              }
          });
      });
    });
      </script>
      
@endsection









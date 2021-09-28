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
                     <form action="{{route('bills.store')}}" method="post" enctype="multipart/form-data" id="fo1">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label>City_name:</label>
                              <select id="gouvern_id" name="gouverne_id" class="form-control col-4" style="border-radius:20px">
                                <option></option>
                              @foreach($gouvernes as $gouverne)
                               <option style="border-radius:10px" value="{{$gouverne->id}}">{{$gouverne->name}}</option>
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
                        </div>
                          </div>
                         

                          <div class="form-group">
                            <div id="branch_div" class="form-group col-12 d-none">
                              <label>Branch_name:</label>
  
                              <select style="border-radius:25px" class="form-control col-4" id="branch_dd" tobetranslated="Related" name="branch_id"
                                  class="form-control select"  tabindex="null">
  
                              </select>
                          </div>
                            </div>


                            <div class="form-group">
                              <label>Product_name:</label>
                              <select  name="product_id" class="form-control col-4" style="border-radius:20px">
                                <option></option>
                              @foreach($products as $product)
                               <option style="border-radius:10px" value="{{$product->id}}">{{$product->name}}</option>
                              @endforeach
                            </select>
                            <span style="color:red;"> {{$errors->first('product_id')}} </span>
                          </div>

                            <div class="form-group">
                                <label>Quantity:</label>
                               <input type="number" class="form-control " style="border-radius:20px" name="quantity" placeholder="Quantity">
                               <span style="color:red;"> {{$errors->first('quantity')}} </span>
                               @if (\Session::has('danger'))
                               <div class="alert alert-danger">
                                   <ul>
                                       <li>{!! \Session::get('danger') !!}</li>
                                   </ul>
                               </div>
                           @endif
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
                      $('#branch_div').addClass('d-none');
                     
                  }



              }
          });
      });


      $('#district_dd').on('change', function() {
                var idDistrict = this.value;
                $.ajax({
                    url: "{{ url('fetch-branches') }}",
                    type: "GET",
                    data: {
                        district_id: idDistrict,
                    },
                    dataType: 'json',
                    success: function(res) {

                        if (res.branches.length != 0) {
                          console.log("ok");
                          $('#branch_div').removeClass('d-none');
                            $('#branch_dd').html('<option value="">Select Branch</option>');
                            $.each(res.branches, function(key, value) {
                                $("#branch_dd").append(`<option value="${value.id}">${value.name}  </option>`);
                            });
                        } else {
                            $('#branch_div').addClass('d-none');
                        }

                    }
                });
            });

    });
      </script>

       {{-- <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script> --}}
@endsection









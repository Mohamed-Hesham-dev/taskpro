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

                    <form action="{{route('bills.update',$bill->id)}}" method="post" enctype="multipart/form-data" id="fo1">
                              @csrf
                              <input type="hidden" name="_method" value="PUT">
                              <div class="form-group">
                                    <label>City_name:</label>
                                    <select id="gouvern_id" name="gouverne_id" class="form-control col-4" style="border-radius:20px">
                                      <option></option>

                                      @foreach($gouvernes as $gouverne)
                                      <option style="border-radius:10px" 
                                      @if ($gouverne->id == $bill->gouverne_id)
                                      selected
                                      @endif
                                      value="{{ $gouverne->id }}">
                                          {{ $gouverne->name }}</option>
                                  @endforeach

                                  </select>
                                  <span style="color:red;"> {{$errors->first('gouverne_id')}} </span>
                                </div>

                                <div id="district_div" class="form-group">
                                        <label>District_name:</label>
                                        <select  id="district_dd" name="district_id" class="form-control col-4" style="border-radius:20px">
                                          <option></option>
    
                                          @foreach($districts as $district)
                                          <option style="border-radius:10px"  class='district_option'
                                          @if ($district->id == $bill->district_id)
                                          selected
                                          @endif
                                          value="{{ $district->id }}">
                                              {{ $district->name }}</option>
                                      @endforeach
    
                                      </select>
                      
                                    </div>
                                  
                                    <div id="branch_div" class="form-group">
                                      <label>Branch_name:</label>
                                      <select  id="branch_dd" name="branch_id" class="form-control col-4" style="border-radius:20px">
                                        <option></option>
  
                                        @foreach($branches as $branch)
                                        <option style="border-radius:10px" class='branch_option'
                                        @if ($branch->id == $bill->branch_id)
                                        selected
                                        @endif
                                        value="{{ $branch->id }}">
                                            {{ $branch->name }}</option>
                                    @endforeach
  
                                    </select>
                    
                                  </div>
                                
                                  <div class="form-group">
                                    <label>Product_name:</label>
                                    <select  name="product_id" class="form-control col-4" style="border-radius:20px">
                                      <option></option>

                                      @foreach($products as $product)
                                      <option style="border-radius:10px" 
                                      @if ($product->id == $bill->product_id)
                                      selected
                                      @endif
                                      value="{{ $product->id }}">
                                          {{ $product->name }}</option>
                                  @endforeach

                                  </select>
                                  <span style="color:red;"> {{$errors->first('product_id')}} </span>
                                </div>


                                  <div class="form-group">
                                    <label>Quantity:</label>
                                   <input type="number" class="form-control " style="border-radius:20px" name="quantity" placeholder="Quantity" value="{{$bill->quantity}}">
                                   <span style="color:red;"> {{$errors->first('quantity')}} </span>
                                   @if (\Session::has('danger'))
                                   <div class="alert alert-danger">
                                       <ul>
                                           <li>{!! \Session::get('danger') !!}</li>
                                       </ul>
                                   </div>
                               @endif
                                </div>
                               <button style="border-radius:20px"  class="btn btn-primary float-right m-2" type="submit"><i class="fas fa-update" > Update</i></button>
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
                 $.ajax({
                     url: "{{ url('fetch-districts') }}",
                     type: "GET",
                     data: {
                       gouverne_id: idGouvern,
                     },
                     dataType: 'json',
                     success: function(result) {
                            $(".district_option").remove();
                            $(".branch_option").remove();
                             $.each(result.districts, function(key, value) {
                                 $("#district_dd").append(`<option class="district_option" style="border-radius:10px" class='val' value="${value.id}">${value.name}  </option>`);
                             });
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
                            $(".branch_option").remove();
                            $.each(res.branches, function(key, value) {
                                $("#branch_dd").append(`<option clas="branch_option" value="${value.id}"
							                  >  ${value.name}  </option>`);
                            });                        

                    }
                });
            });

           });
             </script>
             
@endsection









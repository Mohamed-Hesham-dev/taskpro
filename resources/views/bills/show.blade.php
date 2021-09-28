
@extends('dashboard.index')

@section('content')

<section id="ordering">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a class="btn btn-blue" href="{{route('bills.create')}}"><i class="ft-plus"></i></a>
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
                    <table class="table table-striped table-bordered default-ordering">
                      <thead>
                              <tr>
                                        <th>City_name</th>
                                        <th>District_name</th>
                                        <th>Branch_name</th>
                                        <th>Product_name</th>
                                        <th>Quantity</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                      </tr>
                      </thead>
                      <tbody>
                             
                              <tr>
                                  <td>
                                        {{$bill->gouverne->name}}
                                  </td>
                                  <td>
                                        {{$bill->district->name}}
                                  </td>
                                  <td>
                                    {{$bill->branch->name}}
                              </td>
                              <td>
                                {{$bill->product->name}}
                          </td>
                                  
                                  <td>
                                        {{$bill->quantity}}
                                  </td>
                                  
                                 
                                  <td>
                                        <a href="{{route('bills.edit',$bill->id)}}">Edit</a>
                                             </td>
                                       
                                     <form action="{{route('bills.destroy',$bill->id)}}" method="POST" >
                                         @csrf
                                         <input type="hidden" name="_method" value="delete">
                                         <td>
                                     <button  type="submit" ><i class="icon-trash"></i></button>
                                         </td>
                                     </form>
                                  
                          </tr>
                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection



<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidenav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('admin.nav')
        <!-- partial -->   
        <div class="row mb-2">
        <div class="col-md-4">
            <div style="float: left;">
            <a href="#"><button style="margin-right:10px;" class="btn btn-success">Excel</button></a>
            <button style="margin-right:10px;" class="btn btn-success">PDF</button>
            </div>
        </div>
        <div class="col-md-3">
        <div class="col-sm-12">
            <form action="#" method="GET">
              @csrf
            <input style="color: #fff; background-color:transparent;" name="search" placeholder="Search.."  type="text" class="form-control" />
            </form>
          </div>
        </div>
        <div class="col-md-5">
        <div style="float: right;">
        <a href="#"><button style="margin-right:10px;" class="btn btn-danger">Rejected</button></a>
        <a href="#"><button style="margin-right:10px;" class="btn btn-secondary">Completed</button></a>
        <a href="#"><button style="margin-right:10px;" class="btn btn-primary">Approved</button></a>
        <a href="{{url('newservice')}}"><button style="margin-right:10px;" class="btn btn-success">Add New</button></a>
        </div>      
        </div>
        
        
    </div>   
    <hr class="mb-3">
    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Services</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          
                          <tr>
                            @if (auth()->user()->usertype == 'superadmin')
                            <th>Approve/Reject</th>
                            @endif  
                            <th> Service Name</th>
                            <th>Status</th>  
                            <th> Vehicle</th>
                            <th> Service tpye </th>
                            <th> Garage </th>
                            <th> Mechanic </th>
                            <th> Date of Service </th>
                            <th> Previous DOS </th>
                            <th> Service Parts</th>
                            <th>Mileage(KM) </th>
                            <th> Total Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $service )                                         
                          <tr>
                            @if (auth()->user()->usertype == 'superadmin')
                            <td>
                              <a href="#" class="btn btn-success">Approve</a>
                              <a href="#" class="btn btn-danger">Reject</a>
                            </td>
                            @endif 
                            <td>{{$service->name}}</td>
                            <td class="text-primary">{{$service->status}}</td>
                            <td>{{$service->vehicle}}</td>
                            <td> {{$service->servicetype}}</td>
                            <td>{{$service->garage}}</td>
                            <td>{{$service->mechanic}}</td>
                            <td> {{$service->dos}}</td>
                            <td> {{$service->pdos}}</td>
                            <td>
                                <ol>
                                  @foreach ($service->servicepart as $value )
                                    <li style="margin-bottom: 5px;">{{$value}}</li>
                                  @endforeach

                                </ol>
                            </td>
                            <td>
                                <p>Current Service:<span style="color:#ffffff;">{{$service->cmileage}}</span>KM</p><br>
                                <p>Next Service:<span style="color:#fff">{{$service->nmileage}}</span>KM</p>
                            </td>
                            <td><span>Ksh.</span>{{$service->amount}}</td>                     
                            <td><a href="{{url('updateservice',$service->id)}}"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('You are about to delete a vehicle service Record');" href="{{url('deleteservice',$service->id)}}"><i class="mdi mdi-delete text-danger"></i></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
    @include('admin.footer')

  </body>
</html>

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
            <a href="{{url('exportpending')}}"><button style="margin-right:10px;" class="btn btn-success">Excel</button></a>
            <button style="margin-right:10px;" class="btn btn-success">PDF</button>
            </div>
        </div>
        <div class="col-md-3">
        <div class="col-sm-12">
            <form action="{{url('searchpending')}}" method="GET">
              @csrf
            <input style="color: #fff; background-color:transparent;" name="search" placeholder="Search.."  type="text" class="form-control" />
            </form>
          </div>
        </div>
        <div class="col-md-5">
        <div style="float: right;">
        <a href="{{url('rejectedrepairs')}}"><button style="margin-right:10px;" class="btn btn-danger">Rejected</button></a>
        <a href="{{url('completedrepairs')}}"><button style="margin-right:10px;" class="btn btn-secondary">Completed</button></a>
        <a href="{{url('approvedrepairs')}}"><button style="margin-right:10px;" class="btn btn-primary">Approved</button></a>
        <a href="{{url('newrepairs')}}"><button style="margin-right:10px;" class="btn btn-success">Add New</button></a>
        </div>      
        </div>
        
        
    </div>   
    <hr class="mb-3">
    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Repairs</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            @if (auth()->user()->usertype == 'superadmin')
                            <th>Approve/Reject</th>
                            @endif  
                            <th> Repair Name</th>
                            <th>Status</th>  
                            <th> Vehicle</th>
                            <th> Maintenance tpye </th>
                            <th> Garage </th>
                            <th> Mechanic </th>
                            <th> DOR </th>
                            <th> Previous DOR </th>
                            <th> Expected DOR </th>
                            <th> Image (Fault)</th>
                            <th> Requisition File </th>
                            <th> Total Amount</th>
                            <th>Mechanic Report</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data as $repairs )                                         
                          <tr>
                            @if (auth()->user()->usertype == 'superadmin')
                            <td>
                              <a href="{{url('approve',$repairs->id)}}" class="btn btn-success">Approve</a>
                              <a href="{{url('rejecting',$repairs->id)}}" class="btn btn-danger">Reject</a>
                            </td>
                            @endif 
                            <td>{{$repairs->name}}</td>
                            <td class="text-primary">{{$repairs->status}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->type}}</td>
                            <td>{{$repairs->garage}}</td>
                            <td>{{$repairs->mechanic}}</td>
                            <td> {{$repairs->DOR}}</td>
                            <td> {{$repairs->previous_DOR}}</td>
                            <td> {{$repairs->expected_DOR}}</td>
                            <td> <a href="{{url('downloadrepair',$repairs->image)}}"><img src="repairsimage/{{$repairs->image}}" alt=""></a></td>
                            <td><a href="{{url('downloadfile',$repairs->file)}}">{{$repairs->file}}</a></td>
                            <td>{{$repairs->amount}}</td>
                            <td>{{$repairs->mechanic_report}}</td>
                            
                            <td><a href="{{url('editrepair',$repairs->id)}}"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('You are about to delete a Repair Record');" href="{{url('deleterepair',$repairs->id)}}"><i class="mdi mdi-delete text-danger"></i></a></td>
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
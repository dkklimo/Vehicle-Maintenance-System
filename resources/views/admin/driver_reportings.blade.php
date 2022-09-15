
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
        <div class="col-md-12">
            <div style="float: left;">
            <a href="#"><button style="margin-right:10px;" class="btn btn-success">Excel</button></a>
            </div>
        </div>
        
        
    </div>   
    <hr class="mb-3">
    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Driver Reportings</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Mark Received</th>
                            <th>Driver Name</th>
                            <th> Repair Issue Name</th>
                            <th>Status</th>  
                            <th> Vehicle</th>
                            <th> Date of Occurence </th>
                            <th> Image (Fault)</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data as $repairs )                                         
                          <tr>
                          @if ($repairs->status == 'Pending')
                            <td>
                              <a href="{{url('received',$repairs->id)}}" class="btn btn-success">Received</a>
                            </td>
                            @else
                            <td>
                            <div class="badge badge-outline-danger">Marked</div>
                            </td>

                          @endif
                          <td>{{$repairs->driver}}</td>
                            <td>{{$repairs->name}}</td>
                            <td class="text-primary">{{$repairs->status}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->date}}</td>
                            <td> <a href="{{url('downloadreporting',$repairs->image)}}"><img src="driverreportings/{{$repairs->image}}" alt=""></a></td>
                            <td>{{$repairs->description}}</td>
                            
                            <td><a href="#"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('You are about to delete a Driver Repair reporting');" href="{{url('cancelreporting',$repairs->id)}}"><i class="mdi mdi-delete text-danger"></i></a></td>
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
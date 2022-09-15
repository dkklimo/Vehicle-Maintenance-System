<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('driver.sidenav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('driver.nav')
        <!-- partial -->
        <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{Auth::User()->name}} Reportings.</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr> 
                            <th> Issue Name</th> 
                            <th> Vehicle</th>
                            <th> Date of Occurence </th>
                            <th> Image (Fault)</th>
                            <th>Description</th>
                            <th>Status</th> 
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data as $repairs )                                         
                          <tr>
                            <td>{{$repairs->name}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->date}}</td>
                            <td><img src="driverreportings/{{$repairs->image}}" alt=""></td>
                            <td>{{$repairs->description}}</td>
                            <td class="text-primary">{{$repairs->status}}</td>
                            <td>
                                @if ($repairs->status == 'Pending')
                                <a href="#"><i class="mdi mdi-grease-pencil text-success"></i> </a>
                                <a onclick="return confirm('You are About to Cancel your Reporting');" href="{{url('cancelreporting',$repairs->id)}}"><i class="mdi mdi-close text-danger"></i></a>
                                @endif
                                
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
    @include('driver.footer')
  </body>
</html>
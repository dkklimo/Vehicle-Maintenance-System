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
        <div class="col-md-6">
            <div style="float: left;">
            <button style="margin-right:10px;" class="btn btn-success">Excel</button>
            <button style="margin-right:10px;" class="btn btn-success">PDF</button>
            </div>
        </div>
        <div class="col-md-6">
        <a href="{{url('newgarage')}}"><button style="float: right; margin-right:10px;" class="btn btn-success">Add New</button></a>
        </div>
        
        
    </div>   
    <hr class="mb-3">

    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Garages</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Garage Name </th>
                            <th> Phone No </th>
                            <th> Email </th>
                            <th> Address </th>
                            <th> Location </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>          
                        @foreach ($data as $garage )         
                          <tr>
                            <td>{{$garage->name}}</td>
                            <td>{{$garage->phone}}</td>
                            <td> {{$garage->email}}</td>
                            <td>{{$garage->address}}</td>
                            <td>{{$garage->location}}</td>
                            <td><a href="{{url('editgarage',$garage->id)}}"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('You are about to delete a Garage in the List');" href="{{url('deletegarage',$garage->id)}}"><i class="mdi mdi-delete text-danger"></i></a></td>
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
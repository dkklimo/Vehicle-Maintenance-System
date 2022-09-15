
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
        </div>
        <div class="col-md-6">
        <a href="{{url('newuser')}}"><button style="float: right; margin-right:10px;" class="btn btn-success">New User</button></a>
        </div>
        
        
    </div>   
    <hr class="mb-3">

    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users List</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Full Name </th>
                            <th> Phone No </th>
                            <th> Email </th>
                            <th> User Type </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($users as $user)           
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->usertype}} </td>
                            <td><a href="#"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('Are you sure to delete this user?');" href="{{url('deleteuser',$user->id)}}"><i class="mdi mdi-delete text-danger"></i></a><button class="btn btn-primary">Change Password</button></td>
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
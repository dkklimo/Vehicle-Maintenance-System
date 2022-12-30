
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
        <div class="row">
        <div class="col-md-3 grid-margin stretch-card"></div> 
        <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New User</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="forms-sample" method="POST" action="{{url('createuser')}}">
                       @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input name="username" style="color:#ffffff; background-color: #2A3038;" type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Phone Number.</label>
                        <input name="phone" style="color:#ffffff; background-color: #2A3038;" type="text" class="form-control" id="exampleInputUsername1" placeholder="Phone Number">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" style="color:#ffffff; background-color: #2A3038;" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Postal address</label>
                        <input name="address" style="color:#ffffff; background-color: #2A3038;" type="text" class="form-control" id="exampleInputEmail1" placeholder="Physical Address">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectusertype">User Type</label>
                        <select name="usertype" style="color:#ffffff; background-color: #2A3038;" class="form-control" id="usertype">
                          <option value="superadmin">Superadmin</option>
                          <option value="admin">Admin</option>
                          <option value="driver">Driver</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" style="color:#ffffff; background-color: #2A3038;" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input style="color:#ffffff; background-color: #2A3038;" type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                      </div>
            
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button type="clear" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card"></div> 
   </div>


    @include('admin.footer')
  </body>
</html>
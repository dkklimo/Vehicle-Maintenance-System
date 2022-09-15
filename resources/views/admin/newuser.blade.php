
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style type="text/stylesheet">
    input{
        color: #000;
    }

   </style>
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
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Phone Number.</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Postal address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectusertype">User Type</label>
                        <select class="form-control" id="usertype">
                          <option>Superadmin</option>
                          <option>Admin</option>
                          <option>Driver</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
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
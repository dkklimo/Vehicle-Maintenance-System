
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
        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Garage</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('garage_data')}}" enctype="multipart/form-data">
                        @csrf
                      <p class="card-description"> Garage Details </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Garage Name</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Garage Name" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="phone" placeholder="Phone Number"  type="text" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="email" placeholder="Email"  type="email" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="address" placeholder="Address"  type="text" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                          <div class="form-group row">
                                <label for="location" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input style="color: #fff; background-color:transparent;" type="text" class="form-control" id="exampleInputCity1" name="location" placeholder="Location">   
                                </div>
                                
                            </div>
                          </div>
                          <div class="col-md-6"></div>

                      </div>

                      <br>
                      <br>
                      <div>
                          <input type="submit" style="float: left;" class="btn btn-success btn-fw" value="Submit">
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
    
    @include('admin.footer')
  </body>
</html>

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
                    <h4 class="card-title">New Vehicle</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('vehicle_data')}}" enctype="multipart/form-data">
                        @csrf
                      <p class="card-description"> Vehicle Details </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Registration Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="registration" class="form-control" placeholder="Registration Number" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Model Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="model" placeholder="Model Number"  type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle Type</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="type" placeholder="i.e BMW "  type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="active" checked> Active </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Not Active"> Not Active </label>
                              </div>
                            </div>
                          </div>
                        </div>
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
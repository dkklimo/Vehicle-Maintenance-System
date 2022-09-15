
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
                    <h4 class="card-title">New Mechanic</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('mechanic_data')}}" enctype="multipart/form-data">
                        @csrf
                      <p class="card-description"> Mechanic Details </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mechanic Name</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Mechanic Name" required />
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
                            <label class="col-sm-3 col-form-label">Garage</label>
                            <div class="col-sm-9">
                                <select name="garage" class="js-example-basic-single" style="width:100%; background-color:transparent;">
                                @foreach ( $garage as $garages )

                                <option style="background-color: black;" value="{{$garages->name}}">{{$garages->name}}</option>

                                @endforeach
                                    
                                </select>
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
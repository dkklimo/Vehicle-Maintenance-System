
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  <style type="text/css">
    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 15%;
  }
  </style>
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
                    <h4 class="card-title">Driver Details</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('updatedriver',$data->id)}}" enctype="multipart/form-data">
                        @csrf
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Full Name" required value="{{$data->name}}"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="phone" placeholder="Phone Number"  type="text" class="form-control" value="{{$data->phone}}" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select name="gender" style="color: #fff;" class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="date"  class="form-control" type="date" placeholder="dd/mm/yyyy" value="{{$data->DOB}}"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="email" placeholder="Email"  type="email" class="form-control" value="{{$data->email}}" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Licence Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="lnumber" placeholder="Licence Number" type="text" class="form-control" value="{{$data->lnumber}}" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <label for="">Old Image</label>
                                <img class="center" src="driverimage/{{$data->image}}" width="50px" height="50px" alt="">
                            </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image(passport size)</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="image"  type="file" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="card-description"> Address </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="address" type="text" class="form-control" value="{{$data->address}}" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">County</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="county" placeholder="County of Residence"  type="text" class="form-control" value="{{$data->county}}" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="city" placeholder="City"  type="text" class="form-control" value="{{$data->city}}"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <select name="country" style="color: #fff;" class="form-control">
                                <option value="Kenya"{{ ($data->country=="Kenya")? "selected" : "" }}>Kenya</option>
                                <option value="Uganda"{{ ($data->country=="Uganda")? "selected" : "" }} >Uganda</option>
                                <option value="Tanzania"{{ ($data->country=="Tanzania")? "selected" : "" }}>Tanzania</option>
                                <option value="Rwanda"{{ ($data->country=="Rwanda")? "selected" : "" }}>Rwanda</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <br>
                            <input style="float: left;" type="submit" class="btn btn-success" value="Update">
                            </div>
                            <div class="col-md-6"></div>
                        </div>

                      
                    </form>
                  </div>
                </div>
              </div>
    
    @include('admin.footer')
  </body>
</html>
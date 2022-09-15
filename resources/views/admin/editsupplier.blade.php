
<!DOCTYPE html>
<html lang="en">
  <head>
   <base href="/public">
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
                    <h4 class="card-title">Edit Supplier</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('updatesupplier',$data->id)}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Supplier Name</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Supplier Name" value="{{$data->name}}" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="phone" placeholder="Phone Number"  type="text" class="form-control" value="{{$data->phone}}" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="email" placeholder="Email"  type="email" class="form-control" value="{{$data->email}}" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="address" placeholder="Physical Address" type="text" class="form-control" value="{{$data->address}}" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City/Town</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="city" placeholder="City"  type="text" class="form-control" value="{{$data->city}}" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <select name="country" style="color: #fff;" class="form-control" value="{{$data->country}}" required>
                                <option value="Kenya"{{ ($data->country=="Kenya")? "selected" : "" }}>Kenya</option>
                                <option value="Uganda"{{ ($data->country=="Uganda")? "selected" : "" }}>Uganda</option>
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
                            <input style="float: left;" type="submit" class="btn btn-success" value="Submit">
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
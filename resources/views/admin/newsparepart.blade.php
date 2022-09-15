
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
                    <h4 class="card-title">Spare Part Details</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('spare_data')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spare Part Name</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Spare Part Name" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price(Ksh.)</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="price" placeholder="Price"  type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Purchase</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="dop"  class="form-control" type="date" placeholder="dd/mm/yyyy" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Installation</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="doi"  class="form-control" type="date" placeholder="dd/mm/yyyy" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Service Life</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="service" placeholder=" i.e 9 Months"  type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Auto Part</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="Genuine" checked> Genuine </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Non Genuine"> Non Genuine </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="image"  type="file" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Serial No.</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="snumber" class="form-control" placeholder="Serial Number" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Supplier</label>
                            <div class="col-sm-9">
                              <select name="supplier" style="color: #fff;" class="form-control">
                                @foreach ( $supplier as $suppliers )
                                <option value="{{$suppliers->name}}">{{$suppliers->name}}</option>     
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle</label>
                            <div class="col-sm-9">
                              <select name="vehicle" style="color: #fff;" class="form-control">
                                @foreach ( $vehicle as $vehicles )
                                <option value="{{$vehicles->registration_No}}">{{$vehicles->registration_No}}</option>     
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Description</label>
                            <div class="col-sm-11">
                              <input style="color: #fff; background-color:transparent;" name="description" placeholder="Description"  type="text" class="form-control" />
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
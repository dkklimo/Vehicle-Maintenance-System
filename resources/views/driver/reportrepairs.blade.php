<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('driver.sidenav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('driver.nav')
        <!-- partial -->
        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Repair Issue</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('report_data')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Repair Issue Name </label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Repair Issue Name" required />
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
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Occurence</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="date"  class="form-control" type="date" placeholder="dd/mm/yyyy" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image (Fault)</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="image"  type="file" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <input style="color: #fff; background-color:transparent;" name="description" placeholder="Brief Description of the Issue"  type="text" class="form-control" />
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
    
    @include('driver.footer')
  </body>
</html>
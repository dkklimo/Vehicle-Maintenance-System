
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
                    <h4 class="card-title">Vehicle Service Details</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('servicedata')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Service Name </label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" placeholder="Service Name" required />
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
                            <label class="col-sm-3 col-form-label">Previous DOS</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="pdos"  class="form-control" type="date" placeholder="dd/mm/yyyy" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">DOS</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="dos"  class="form-control" type="date" placeholder="dd/mm/yyyy" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group required row">
                            <label class="col-sm-3 col-form-label">Service Parts</label>
                            <div class="col-sm-9">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="servicepart[]" value="Engine Oil"> Engine Oil </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Oil Filter" > Oil Filter </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Transmission Oil"> Transmission Oil </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Air Filter"> Air Filter </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Plugs"> Plugs </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Pollen Filter/AC Filter"> Pollen Filter/AC Filter </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="servicepart[]" value="Fuel Filter"> Fuel Filter </label>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Service Type</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="Minor Servicing" checked> Minor Servicing </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Major Servicing"> Major Servicing </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Garage</label>
                            <div class="col-sm-9">
                              <select name="garage" style="color: #fff;" class="form-control">
                                @foreach ( $garage as $garages )
                                <option value="{{$garages->name}}">{{$garages->name}}</option>     
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mechanic</label>
                            <div class="col-sm-9">
                              <select name="mechanic" style="color: #fff;" class="form-control">
                                @foreach ( $mechanic as $mechanics )
                                <option value="{{$mechanics->name}}">{{$mechanics->name}}</option>     
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Current Mileage(KM)</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="cmileage" placeholder=" Current Mileage(KM)"  type="text" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Next Servicing Mileage(KM)</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="nmileage" placeholder="Mileage(KM)"  type="text" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Amount</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="amount" placeholder=" Total Amount"  type="text" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mechanic Report</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="report" placeholder="Brief Mechanic Report"  type="text" class="form-control" />
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

    <script type="text/javascript">
      $('div.checkbox-group.required :checkbox:checked').length > 0
    </script>
  </body>
</html>
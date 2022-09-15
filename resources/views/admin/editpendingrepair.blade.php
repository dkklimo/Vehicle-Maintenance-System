
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
   @include('admin.css')

   <style type="text/css">
    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 15%;
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
        <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Repair Details</h4>
                    @if(session()->has('message'))       
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{session()->get('message')}}
                    </div>
                    @endif
                    <form class="form-sample" method="POST" action="{{url('editrepair_data',$data->id)}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Repair Name </label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" type="text" name="name" class="form-control" value="{{$data->name}}" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Vehicle</label>
                            <div class="col-sm-9">
                              <select name="vehicle" style="color: #fff;" class="form-control">
                                @foreach ( $vehicle as $vehicles )
                                <option value="{{$vehicles->registration_No}}"{{($vehicles->registration_No==$data->vehicle)? "selected" : "" }}>{{$vehicles->registration_No}}</option>   
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Previous DOR</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="pdor"  class="form-control" type="date" value="{{$data->previous_DOR}}" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Expectd DOR</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="edor"  class="form-control" type="date" value="{{$data->expected_DOR}}" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Repair</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:#191c24;" name="dor"  class="form-control" type="date" value="{{$data->DOR}}" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Maintenance Type</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="Servicing"  {{ $data->type == 'Servicing' ? 'checked' : '' }}> Servicing </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Repairs"  {{ $data->type == 'Repairs' ? 'checked' : '' }}> Repairs </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image (Fault)</label>
                            <div class="col-sm-9">
                            <div class="text-center">
                                <label for="">Old Image</label>
                                <img class="center" src="repairsimage/{{$data->image}}" width="50px" height="50px" alt="">
                            </div>
                              <input style="color: #fff; background-color:transparent;" name="image"  type="file" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Requisition File</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="file"  type="file" class="form-control"/>
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
                                <option value="{{$garages->name}}"{{ ($garages->name==$data->garage)? "selected" : "" }}>{{$garages->name}}</option>     
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
                                <option value="{{$mechanics->name}}"{{ ($mechanics->name==$data->mechanic)? "selected" : "" }}>{{$mechanics->name}}</option>    
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Amount</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="amount" value="{{$data->amount}}"  type="text" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mechanic Report</label>
                            <div class="col-sm-9">
                              <input style="color: #fff; background-color:transparent;" name="report" value="{{$data->mechanic_report}}"  type="text" class="form-control" />
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
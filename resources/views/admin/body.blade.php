

            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Expired Documents</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0 text-center">5</h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-note text-primary ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Pending Repairs</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">{{$repairs}}</h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Vehicles</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">{{$count}}</h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-car text-success ms-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Spare Parts chart</h4>
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Repairs chart</h4>
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Repairs</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          <th> Repair Name</th>
                            <th> Vehicle</th>
                            <th> Maintenance tpye </th>
                            <th> Mechanic </th>
                            <th> Image (Fault)</th>
                            <th> Requisition File </th>
                            <th> Total Amount</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $repairs )                                         
                          <tr>
                          <td>{{$repairs->name}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->type}}</td>
                            <td>{{$repairs->mechanic}}</td>
                            <td> <a href="{{url('downloadrepair',$repairs->image)}}"><img src="repairsimage/{{$repairs->image}}" alt=""></a></td>
                            <td><a href="{{url('downloadfile',$repairs->file)}}">{{$repairs->file}}</a></td>
                            <td>{{$repairs->amount}}</td>
                            <td>
                              @if ($repairs->status == 'Approved')
                              <div class="badge badge-outline-success">{{$repairs->status}}</div>
                              @elseif ($repairs->status == 'Pending')
                              <div class="badge badge-outline-primary">{{$repairs->status}}</div>
                              @elseif ($repairs->status == 'Completed')
                              <div class="badge badge-outline-secondary">{{$repairs->status}}</div>
                              @else
                              <div class="badge badge-outline-danger">{{$repairs->status}}</div>
                              @endif
                              
                            </td>            
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
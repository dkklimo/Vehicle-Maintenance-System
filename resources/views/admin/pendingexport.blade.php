<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Repairs</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                          <th> Repair Name</th>
                          <th>Status</th>
                            <th> Vehicle</th>
                            <th> Maintenance tpye </th>
                            <th> Garage </th>
                            <th> Mechanic </th>
                            <th> DOR </th>
                            <th> Previous DOR </th>
                            <th> Expected DOR </th>
                            <th> Total Amount</th>
                            <th>Mechanic Report</th>
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data as $repairs )                                         
                          <tr>
                          <td>{{$repairs->name}}</td>
                           <td class="text-primary">{{$repairs->status}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->type}}</td>
                            <td>{{$repairs->garage}}</td>
                            <td>{{$repairs->mechanic}}</td>
                            <td> {{$repairs->DOR}}</td>
                            <td> {{$repairs->previous_DOR}}</td>
                            <td> {{$repairs->expected_DOR}}</td>
                            <td>{{$repairs->amount}}</td>
                            <td>{{$repairs->mechanic_report}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
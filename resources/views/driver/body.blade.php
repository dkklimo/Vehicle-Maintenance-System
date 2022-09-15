<div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Repairs Reported</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr> 
                            <th> Issue Name</th> 
                            <th> Vehicle</th>
                            <th> Date of Occurence </th>
                            <th> Image (Fault)</th>
                            <th>Description</th>
                            <th>Status</th> 
                          </tr>
                        </thead>
                        <tbody>  
                          @foreach ($data as $repairs )                                         
                          <tr>
                            <td>{{$repairs->name}}</td>
                            <td>{{$repairs->vehicle}}</td>
                            <td> {{$repairs->date}}</td>
                            <td><img src="driverreportings/{{$repairs->image}}" alt=""></td>
                            <td>{{$repairs->description}}</td>
                            <td class="text-primary">{{$repairs->status}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
           
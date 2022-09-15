
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
        <div class="row mb-2">
        <div class="col-md-4">
            <div style="float: left;">
            <button style="margin-right:10px;" class="btn btn-success">Excel</button>
            <button style="margin-right:10px;" class="btn btn-success">PDF</button>
            </div>
        </div>
        <div class="col-md-3">
        <div class="col-sm-12">
            <form action="{{url('searchspare')}}" method="GET">
              @csrf
            <input style="color: #fff; background-color:transparent;" name="search" placeholder="Search..name/vehicle"  type="text" class="form-control" />
            </form>
          </div>
        </div>
        <div class="col-md-5">
        <a href="{{url('newsparepart')}}"><button style="float: right; margin-right:10px;" class="btn btn-success">Add New</button></a>
        
        </div>
        
        
    </div>   
    <hr class="mb-3">
    <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Purchased Spare Parts</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Spare Part Name </th>
                            <th> Vehicle </th>
                            <th> Price(Ksh) </th>
                            <th> DOP (Purchase) </th>
                            <th> DOI (Installation) </th>
                            <th> Auto Part </th>
                            <th>Serial No.</th>
                            <th> Supplier </th>
                            <th> Service Life </th>
                            <th> Image</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($data as $sparepart)                     
                          <tr>
                            <td>{{$sparepart->name}}</td>
                            <td>{{$sparepart->vehicle}}</td>
                            <td> {{$sparepart->price}}</td>
                            <td>{{$sparepart->DOP}}</td>
                            <td>{{$sparepart->DOI}}</td>
                            <td> {{$sparepart->auto_part}}</td>
                            <td> {{$sparepart->serial}}</td>
                            <td> {{$sparepart->supplier}}</td>
                            <td> {{$sparepart->service_life}}</td>
                            <td> <a href="{{url('download',$sparepart->image)}}"><img style="border-radius: 0%;" src="sparepartsimage/{{$sparepart->image}}" height="200px" width="200px" alt=""></a></td>
                            <td> {{$sparepart->description}}</td>
                            <td><a href="#"><i class="mdi mdi-grease-pencil text-success"></i> </a><a onclick="return confirm('You are about to delete a Spare part Record');" href="{{url('delete_sparepart',$sparepart->id)}}"><i class="mdi mdi-delete text-danger"></i></a></td>
                          </tr>
                    @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
    @include('admin.footer')

  </body>
</html>
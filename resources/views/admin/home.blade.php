
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
    @include('admin.body')      
    
    @include('admin.footer')
    <script type="text/javascript">
      var _ydata = JSON.parse('{!! json_encode($months)!!}');
      var _xdata = JSON.parse('{!! json_encode($monthcount)!!}');
      var _yspare = JSON.parse('{!! json_encode($sparemonth)!!}');
      var _xspare = JSON.parse('{!! json_encode($monthsparecount)!!}');
    </script>
  </body>
</html>
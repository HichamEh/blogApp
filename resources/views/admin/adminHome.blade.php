<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.navbar')
      <!-- Sidebar Navigation end-->
      @include('admin.content')
       @include('admin.footer')
  </body>
</html>
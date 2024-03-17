<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title', 'THT - Trang quản trị')</title>

 <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/seller/template/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="/seller/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/seller/template/dist/css/adminlte.min.css">
<link rel="stylesheet" href="/seller/template/dist/css/tab.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      @include('seller.layouts.navbar')
      <!-- End Navbar -->

      <!-- Sidebar -->
      @include('seller.layouts.sidebar')
      <!-- End Sidebar -->

      <div class="content-wrapper">

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">

               @include('seller.layouts.alert')

               <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                     <!-- jquery validation -->
                     <div class="card card-primary mt-3">
                        
                        <div class="card-body">
                           @yield('content')</div>

                     </div>
                     <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">

                  </div>
                  <!--/.col (right) -->
               </div>
               <!-- /.row -->
            </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>

      @include('seller.layouts.footer')

   </div>

   @include('seller.layouts.javascript')
</body>

</html>
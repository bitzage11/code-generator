<!DOCTYPE html>

<html>

  <head>



    <title>Redirect - @yield('title')</title>

    @include('admin.master.head')



  </head>

  <body class="hold-transition skin-blue  sidebar-mini">

    <!-- Site wrapper -->

    <div class="wrapper">



      <header class="main-header">@include('admin.master.header')</header>



      <!-- =============================================== -->



      <!-- Left side column. contains the sidebar -->

      <aside class="main-sidebar">@include('admin.master.sidebar')</aside>



      <!-- =============================================== -->



      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">@yield('content')</div>

      <!-- /.content-wrapper -->



      <footer class="main-footer">@include('admin.master.footer')</footer>



    </div>

    <!-- ./wrapper -->

    @section('foot')



    @show 

  </body>

</html>


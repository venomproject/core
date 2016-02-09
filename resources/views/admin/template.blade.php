<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
		@include('admin.includes.head')
	</head>
    <body class="skin-blue">
        <div class="wrapper">
            @include('admin.includes.header')
            @include('admin.includes.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Lista stron
                    <small>Dodaj</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                
               
                
                
                <!-- Main content -->
                <section class="content">
                
                 	@include('admin.includes.alert_message')
                
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>
        </div><!-- ./wrapper -->
 
 
  @include('admin.includes.script')
 
    </body>
</html>
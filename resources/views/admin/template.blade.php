<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel CMS | {{$title or 'Podgląd'}}  </title>
		@include('admin.includes.head')
	</head>
    <body class="skin-blue">
        <div class="wrapper">
            @include('admin.includes.header')
            @include('admin.includes.sidebar')

            <div class="content-wrapper">

				<section class="content-header">
                    <h1>
                   {{$title or 'Podgląd'}} 
                    <small>Dodaj</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                                
                <section class="content">
                
                 	@include('admin.includes.alert_message')
                
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2013-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>
        </div>
 
 
  @include('admin.includes.script')
 
    </body>
</html>
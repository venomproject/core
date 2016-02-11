<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Frontend</title> 
@include('frontend.includes.head')
</head>
<body>
@include('frontend.includes.header')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
               @yield('content')
            </div>
        </div>
    </div>
</div>




	
@include('frontend.includes.footer')

@include('frontend.includes.script')
</body>
</html>
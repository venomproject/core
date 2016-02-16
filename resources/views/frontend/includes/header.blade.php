<header>
    <a href="#">logo</a>

	
    <nav class="navbar navbar-default">
        <div class="container-fluid">
		<div class="container">
		<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Nawigacja</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li {{Request::is('/') ? 'class=active' :'' }}><a href="{{URL::to('/')}}">Home</a></li>
		
@foreach ($header_menu as $link)
	<li {{Request::segment(1) == $link->id ? 'class=active' : ''}}>
		<a href="{{URL::to('/')}}/{{ $link->id}}/{{ $link->seo}}">{{$link->name}}</a>	
	</li>
	@endforeach
			 
            </ul>
            
          </div>
		  </div>
        </div>
      </nav>
</header>
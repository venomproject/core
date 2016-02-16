<footer class="main-footer">
	
	<ul>
	@foreach ($footer_menu as $link)
	<li>
		<a href="{{URL::to('/')}}/{{ $link->id}}/{{ $link->seo}}">{{$link->name}}</a>	
	</li>
	@endforeach
	</ul>
	
	
	
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>




<link rel="stylesheet" type="text/css" href="{{ asset('../public/fancybox/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
<script type="text/javascript" src="{{ asset('../public/fancybox/jquery.fancybox.pack.js?v=2.1.5') }}"></script>


<script>

$(document).ready(function() {
        $('.fancybox').fancybox();
    });

</script>

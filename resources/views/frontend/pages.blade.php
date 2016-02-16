@extends('frontend.app')
@section('content')

<h1>{{ $page->name}}</h1>
{!! $page->description!!}
<hr/>

<p>{!! $page->create_date!!}</p>


	@foreach($page->files as $photo)
	
	<a title="{{$photo->name}}" data-fancybox-group="gallery" href="{{ asset('/uploads/'.$page->id) }}/{{$photo->name}}" class="fancybox">
	
	
	
		<img src="{{ asset('/uploads/'.$page->id) }}/thumb/{{$photo->name}}" alt="{{$photo->name}}" />
		</a>
	@endforeach

@endsection

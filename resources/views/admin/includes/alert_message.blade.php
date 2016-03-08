@if (session('status'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
		<h4>
		<i class="icon fa fa-bullhorn"></i> Sukces!
	</h4>
        {{ session('status') }}
    </div>
@endif

@if (session('info'))
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fa fa-info"></i> Info!
	</h4>
		{{ session('info') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fa fa-warning"></i> Uwaga!
	</h4>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li> @endforeach
	</ul>
</div>
@endif

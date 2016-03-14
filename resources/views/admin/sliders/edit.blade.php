@extends('admin.template') @section('content')
<div class="row">
	{!!
	Form::model($row,array('route' => array('admin.slider.update', $row->id), 'method' => 'PUT','files'=>true)) !!}
	<div class="col-md-9">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
				<i class="fa fa-edit"></i> Treść
				</h3>
			</div>
			<div class="box-body">
				<div class="form-group">{!! Form::label('Nazwa') !!} {!!
					Form::text('name', null, array('id' => 'pageName',  'class' =>
				'form-control','placeholder' => 'Nazwa strony')) !!}</div>
				<div class="form-group">{!! Form::label('Opis') !!} {!!
					Form::textarea('description', null, array('class' =>
				'form-control tinymce','placeholder' => 'Opis strony')) !!}</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle"
				src="https://cdn2.iconfinder.com/data/icons/bitsies/128/Info-128.png"
				alt="User profile picture">
				<h3 class="profile-username text-center">Edycja slider</h3>
				{!! Form::submit('Zapisz', array('class' => 'btn btn-block
				btn-primary btn-lg ')) !!}
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">
				Zdjęcie
				</h3>
			</div>
			<div class="box-body">


			<img alt="" class="img-responsive" src="{{ asset('/uploads/sliders') }}/{{$row->filename}}" />

			<br/>
				<div class="control-group">
					<div class="controls">
						{!! Form::file('images') !!}
						<p class="e	rrors">{!!$errors->first('images')!!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
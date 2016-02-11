@extends('admin.template') @section('content') 

{!! Form::open(['action' => 'Admin\PagesController@store']) !!}
<div class="row">
	<div class="col-xs-8">

		<div class="box">

			<div class="box-header">
				<h3 class="box-title">Lista</h3>
			</div>

			<div class="box-body">


				<div class="form-group">{!! Form::label('name') !!} {!!
					Form::text('name', null, array('placeholder' => 'Nazwa strony',
					'class' => 'form-control')) !!}</div>

				<div class="form-group">{!! Form::label('description') !!} {!!
					Form::text('description', null, array('placeholder' => 'Opis
					strony', 'class' => 'form-control')) !!}</div>

			</div>
			<div class="box-footer">{!! Form::submit('Zapisz', array('class' =>
				'btn btn-primary pull-right')) !!}</div>

		</div>

	</div>
	<div class="col-xs-4">


		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Opcje</h3>
			</div>
			<div class="box-body">

				<div class="form-group">
					{!! Form::label('create_date', 'Data wpisu') !!}
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::text('create_date',
						\Carbon\Carbon::now()->format('d-m-Y'), array('placeholder' =>
						'dd-mm-rrrr','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('public_date', 'Data publikacji') !!}
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::text('public_date',
						\Carbon\Carbon::now()->format('d-m-Y'), array('placeholder' =>
						'dd-mm-rrrr','class' => 'form-control')) !!}
					</div>
				</div>

				<div class="checkbox">
					<label>{!! Form::checkbox('show_menu', true, false,
						array('class' => 'minimal')) !!} Wyświetl w menu</label>
				</div>

				<div class="checkbox">
					<label>{!! Form::checkbox('show_footer', true, false,
						array('class' => 'minimal')) !!} Wyświetl w stopce</label>
				</div>





			</div>
		</div>

		<div class="box box-info collapsed-box">
			<div class="box-header">
				<h3 class="box-title">Ustawienia SEO</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-plus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<div class="form-group">{!! Form::label('seo') !!} {!!
					Form::text('seo', null, array('placeholder' => 'przyjazny
					link','class' => 'form-control')) !!}</div>

				<div class="form-group">{!! Form::label('meta_title') !!} {!!
					Form::text('meta_title', null, array('placeholder' => 'tytuł
					strony','class' => 'form-control')) !!}</div>

				<div class="form-group">{!! Form::label('meta_keywords') !!} {!!
					Form::text('meta_keywords', null, array('placeholder' => 'słowa
					kluczowe','class' => 'form-control')) !!}</div>

				<div class="form-group">{!! Form::label('meta_description') !!} {!!
					Form::textarea('meta_description', null, array('placeholder' =>
					'meta opis','class' => 'form-control')) !!}</div>

			</div>
		</div>
		
		
		{!! Form::close() !!} 
@endsection
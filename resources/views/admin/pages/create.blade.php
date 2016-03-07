@extends('admin.template') @section('content')
<div class="row">
	{!!
	Form::model('test',array('route' => array('admin.pages.create'), 'method' => 'POST','files'=>true)) !!}
	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#textTab" data-toggle="tab"><i
				class="fa fa-edit"></i> Treść</a></li>
				<li><a href="#galleryTab" data-toggle="tab"><i class="fa fa-photo"></i>
				Zdjęcia</a></li>
				<li><a href="#seoTab" data-toggle="tab"><i class="fa fa-line-chart"></i>
				Ustawienia SEO</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="textTab">
					<div class="box-body">
						<div class="form-group">{!! Form::label('Nazwa') !!} {!!
							Form::text('name', null, array('id' => 'pageName',  'class' =>
						'form-control','placeholder' => 'Nazwa strony')) !!}</div>
						<div class="form-group">{!! Form::label('Opis') !!} {!!
							Form::textarea('description', null, array('class' =>
						'form-control tinymce','placeholder' => 'Opis strony')) !!}</div>
					</div>
				</div>
				<div class="tab-pane" id="galleryTab" style="overflow: hidden;">
					<div class="control-group">
						<div class="controls">
							{!! Form::file('images[]', array('multiple'=>true)) !!}
							<p class="e	rrors">{!!$errors->first('images')!!}</p>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="seoTab">
					<div class="box-body">
						<div class="form-group">
							<div class="form-group">
								{!! Form::label('seo') !!}
								<div class="input-group">
									{!! Form::text('seo', null, array('class' => 'form-control' ,
									'placeholder' => 'przyjazny link')) !!}
									<span class="input-group-addon"><i class="fa fa-refresh" style="cursor: pointer;" id="seo_generator"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">{!! Form::label('meta_title') !!} {!!
							Form::text('meta_title', null, array('class' =>
						'form-control','placeholder' => 'tytuł strony')) !!}</div>
						<div class="form-group">{!! Form::label('meta_keywords') !!} {!!
							Form::text('meta_keywords', null, array('class' =>
						'form-control','placeholder' => 'słowa kluczowe')) !!}</div>
						<div class="form-group">{!! Form::label('meta_description') !!}
							{!! Form::textarea('meta_description', null, array('placeholder'
						=> 'meta opis','class' => 'form-control')) !!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle"
				src="https://cdn2.iconfinder.com/data/icons/bitsies/128/Info-128.png"
				alt="User profile picture">
				<h3 class="profile-username text-center">Nowa strona</h3>
				{!! Form::submit('Zapisz', array('class' => 'btn btn-block
				btn-primary btn-lg ')) !!}
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Opcje</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Kategoria nadrzędna</label> {!! Form::select('pages_id',
					$parentCategory,  $parentID ,
					array('class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('create_date', 'Data wpisu') !!}
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::text('create_date',
						\Carbon\Carbon::createFromFormat('d-m-Y', date('d-m-Y'))->format('d-m-Y'), array('placeholder' =>
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
						\Carbon\Carbon::createFromFormat('d-m-Y', date('d-m-Y'))->format('d-m-Y'), array('placeholder' =>
						'dd-mm-rrrr','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_menu', null, null,
					array('class' => 'minimal')) !!} Wyświetl w menu</label>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_footer', null, null,
					array('class' => 'minimal')) !!} Wyświetl w stopce</label>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_page', null, 1,
					array('class' => 'minimal')) !!} Wyświetl wpis</label>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection
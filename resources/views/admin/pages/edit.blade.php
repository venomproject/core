@extends('admin.template') @section('content')
<div class="row">

<div class="col-md-12">



<div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista podstron</h3>
                  <div class="box-tools pull-right">
                    <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                  The body of the box
                </div><!-- /.box-body -->
              </div>

	</div>



{!!
Form::model($page,array('route' => array('admin.pages.update', $page->id), 'method' => 'PUT','files'=>true)) !!}
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

					<hr />
					<div  id="sortable">
					@foreach($file as $photo)
					<div class="col-md-3">
						<div class="box {{ $photo->masterPhoto == 1 ? 'box-success' : 'box-default' }} collapsed-box thumbPrev">
							<div class="box-header with-border">
								<div class="box-title">
									<img src="{{ asset('/uploads/'.$photo->pages_id.'/thumb/'.$photo->name) }}" alt="{{ $photo->file_name != '' ? $photo->file_name : $photo->name }}" width="100%"  title="{{ $photo->masterPhoto }}"/>
								</div>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool"
									data-widget="collapse" style="background: #000;">
									<i class="fa fa-gears" style="color: #fff;padding: 6px;font-size: 18px;"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">{!! Form::text('filename['.$photo->id.']', $photo->file_name,
								array('class' => 'form-control', 'placeholder' => 'Nazwa')) !!}</div>
								<div class="checkbox">
									<label>{!! Form::checkbox('masterPhoto['.$photo->id.']', null, $photo->masterPhoto,
									array('class' => 'minimal')) !!} ustaw jako główne</label>
								</div>
								<hr />
								<div class="btn btn-block btn-danger btn-sm del" delID="{{ $photo->id }}">usuń</div>


							</div>



						</div>
					</div>

					@endforeach
					</div>
				</div>
				<div class="tab-pane" id="seoTab">
					<div class="box-body">
						<div class="form-group">
							<div class="form-group">
								{!! Form::label('seo') !!}
								<div class="input-group">
									{!! Form::text('seo', $page->seo, array('class' => 'form-control' ,
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
				<h3 class="profile-username text-center">{{ $page->name }}</h3>
				<p class="text-muted text-center">
					<a href="{{URL::to('/')}}/prev/{{ $page->id}}/{{ $page->seo}}"
					target="_blank">Podgląd wpisu</a>
				</p>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item"><b>Data utworzenia</b> <a
						class="pull-right">{{\Carbon\Carbon::createFromFormat('Y-m-d',
					$page->create_date)->format('d-m-Y')}}</a></li>
				</ul>
				{!! Form::submit('Zapisz', array('class' => 'btn btn-block
				btn-primary btn-lg ')) !!}
			</div>
			<!-- /.box-body -->
		</div>
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Opcje</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Kategoria nadrzędna</label> {!! Form::select('pages_id',
					$parentCategory, isset($page->pages_id) ? $page->pages_id : 0,
					array('class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('create_date', 'Data wpisu') !!}
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::text('create_date',
						\Carbon\Carbon::createFromFormat('Y-m-d',
						$page->create_date)->format('d-m-Y'), array('placeholder' =>
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
						\Carbon\Carbon::createFromFormat('Y-m-d',
						$page->public_date)->format('d-m-Y'), array('placeholder' =>
						'dd-mm-rrrr','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_menu', null, $page->show_menu,
					array('class' => 'minimal')) !!} Wyświetl w menu</label>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_footer', null, $page->show_footer,
					array('class' => 'minimal')) !!} Wyświetl w stopce</label>
				</div>
				<div class="checkbox">
					<label>{!! Form::checkbox('show_page', null, $page->show_page,
					array('class' => 'minimal')) !!} Wyświetl wpis</label>
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}
</div>
 @endsection
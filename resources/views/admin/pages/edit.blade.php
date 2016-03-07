@extends('admin.template') @section('content')
<div class="row">

	<div class="col-md-12">
		<div class="box box-default ">
			<div class="box-header with-border">
				<i class="fa fa-edit"></i>
				<h3 class="box-title">Lista podstron</h3>
				<div class="box-tools col-sm-2">
					<a href="/admin/pages/create/{{ $page->id }}" class="btn btn-block btn-success">Dodaj nową podstronę</a>
				</div>
			</div>
			@if (count($childs) > 0)
			<div class="box-body" >
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pozycja</th>
							<th width="125px;"></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($childs as $page)
						<tr role="row" class="even" id="{{ $page->id }}"  {{ $page->show_page != 1 ? 'style=background:#ccc;' : '' }}>
							<td class="sorting_1">{{ $page->id }}</td>
							<td>{{ $page->name }}</td>
							<td>{{ $page->description }}</td>
							<td><i class="glyphicon glyphicon-sort" ></i></td>
							<td>
								<div class="btn-group">
									{!! link_to('admin/pages/'.$page->id.'/edit', 'Edycja',  array('class' => 'btn btn-info')) !!}
									<button type="button" class="btn btn-info dropdown-toggle"
									data-toggle="dropdown">
									<span class="caret"></span> <span class="sr-only">Toggle
								Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										{!! link_to('admin/pages/'.$page->id.'/edit', 'Edycja',  array('class' => '')) !!}
									</li>
									<li role="separator" class="divider"></li>
									<li>{!! Form::open(array('method' => 'DELETE', 'route' =>
										array('admin.pages.destroy', $page->id))) !!}
										{!! Form::button('<i class="fa  fa-trash" style="margin-right: 10px;"></i>Usuń', array('onclick' => 'return confirm("Czy jesteś pewny że chcesz usunąć ?");', 'type' => 'submit', 'class' => 'btn-link deleteBtn')) !!}
									{!! Form::close() !!}</li>
									<li role="separator" class="divider"></li>
									<li>
										<a href="{{URL::to('/')}}/prev/{{ $page->id}}/{{ $page->seo}}" target="_blank"><i class="fa fa-eye"></i>Podgląd</a></li>
										@if ($page->show_page)
										<li><a href="#"><i class="fa  fa-square-o "></i>Wyłącz</a></li>
										@else
										<li><a href="#"><i class="fa fa-check-square-o"></i>Włącz</a></li>
										@endif
									</ul>
								</div>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5">brak rekordów</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			@endif
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
@extends('admin.template') @section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="text-content">
			<div class="span7 offset1">
				<div class="box">
					<div class="box-header">
						<i class="fa fa-edit"></i>
						<h3 class="box-title">Lista</h3>
						<div class="box-tools col-sm-2">
							<a href="/admin/slider/create" class="btn btn-block btn-success">Dodaj</a>
						</div>
					</div>
					<div class="box-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nazwa</th>
									<th>Opis</th>

									<th width="125px;"></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($rows as $page)
								<tr role="row" class="even" id="{{ $page->id }}">
									<td class="sorting_1" >{{ $page->id }}</td>
									<td>{{ $page->name }} </td>
									<td>{{ $page->description }}</td>

									<td>
										<div class="btn-group">
											{!! link_to('admin/slider/'.$page->id.'/edit', 'Edycja',  array('class' => 'btn btn-info')) !!}
											<button type="button" class="btn btn-info dropdown-toggle"
											data-toggle="dropdown">
											<span class="caret"></span> <span class="sr-only">Toggle
										Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												{!! link_to('admin/slider/'.$page->id.'/edit', 'Edycja',  array('class' => '')) !!}
											</li>
											<li role="separator" class="divider"></li>
											<li>{!! Form::open(array('method' => 'DELETE', 'route' =>
												array('admin.slider.destroy', $page->id))) !!}
												{!! Form::button('<i class="fa  fa-trash" style="margin-right: 10px;"></i>Usuń', array('onclick' => 'return confirm("Czy jesteś pewny że chcesz usunąć ?");', 'type' => 'submit', 'class' => 'btn-link deleteBtn')) !!}
											{!! Form::close() !!}</li>
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
						<div class="col-xs-12">
							<div class="row">
								<div class="col-sm-5">
									Wpisy od <b>{!! ($rows->currentPage()-1)*$rows->perPage() !!}</b>
									do <b>{!! $rows->perPage()*$rows->currentPage() !!}</b> <br />Łącznie
									: <strong>{!! $rows->total() !!}</strong>
								</div>
								<div class="col-sm-7">
									<div class="pull-right">{!! $rows->render() !!}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endsection
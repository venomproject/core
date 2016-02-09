@extends('admin.template') @section('content')
<div class="row">
	<div class="col-xs-12">

		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Lista</h3>
			</div>
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pozycja</th>
							<th width="108px;"></th>
						</tr>
					</thead>
					<tbody>

						@forelse ($pages as $page)

						<tr role="row" class="even">
							<td class="sorting_1">{{ $page->id }}</td>
							<td>{{ $page->name }}</td>
							<td>{{ $page->description }}</td>
							<td>{{ $page->position }}</td>
							<td>
								<div class="btn-group">
								
{!! link_to('admin/pages/'.$page->id.'/edit', 'Edycja',  array('class' => 'btn btn-info')) !!}		

									<button type="button" class="btn btn-info dropdown-toggle"
										data-toggle="dropdown">
										<span class="caret"></span> <span class="sr-only">Toggle
											Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a
											href="{{ action('PagesController@edit', ['id' => $page->id]) }}"><i
												class="fa  fa-copy"></i>Kopia</a></li>

										<li>{!! Form::open(array('method' => 'DELETE', 'route' =>
											array('admin.pages.destroy', $page->id))) !!} 
											
											{!! Form::button('<i class="fa  fa-trash"></i>Usuń', array('onclick' => 'return confirm("Czy jesteś pewny że chcesz usunąć ?");', 'type' => 'submit', 'class' => 'btn-link deleteBtn')) !!}
											{!! Form::close() !!}</li>


										<li role="separator" class="divider"></li>
										<li><a href="#"><i class="fa fa-eye"></i>Podgląd</a></li>
										
										
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


				<div class="col-xs-12">
					<div class="row">
						<div class="col-sm-5">
							Wpisy od <b>{!! ($pages->currentPage()-1)*$pages->perPage() !!}</b>
							do <b>{!! $pages->perPage()*$pages->currentPage() !!}</b> <br />Łącznie
							: <strong>{!! $pages->total() !!}</strong>
						</div>
						<div class="col-sm-7">
							<div class="pull-right">{!! $pages->render() !!}</div>
						</div>
					</div>
				</div>

			</div>
		</div>




		@endsection
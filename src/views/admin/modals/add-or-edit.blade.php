@extends('core::admin.template')

@section('title', ucfirst($action).' Modal')

@section('js')
	{{ HTML::script('packages/angel/core/js/ckeditor/ckeditor.js') }}
@stop

@section('content')
	<h1>{{ ucfirst($action) }} Modal</h1>
	@if ($action == 'edit')
		{{ Form::open(array('role'=>'form',
							'url'=>admin_uri('modals/delete/'.$modal->id),
							'class'=>'deleteForm',
							'data-confirm'=>'Delete this modal forever?  This action cannot be undone!')) }}
			<input type="submit" class="btn btn-sm btn-danger" value="Delete Forever" />
		{{ Form::close() }}
	@endif

	@if ($action == 'edit')
		{{ Form::model($modal) }}
	@elseif ($action == 'add')
		{{ Form::open(array('role'=>'form', 'method'=>'post')) }}
	@endif

	@if (isset($menu_id))
		{{ Form::hidden('menu_id', $menu_id) }}
	@endif

	<div class="row">
		<div class="col-md-9">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td>
							<span class="required">*</span>
							{{ Form::label('name', 'Name') }}
						</td>
						<td>
							<div style="width:300px">
								{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name', 'required')) }}
							</div>
						</td>
					</tr>
					<tr>
						<td>
							{{ Form::label('html', 'HTML') }}
						</td>
						<td>
							{{ Form::textarea('html', null, array('class'=>'ckeditor')) }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>{{-- Left Column --}}
		<div class="col-md-3">
			@if ($action == 'edit')
				<div class="expandBelow">
					<span class="glyphicon glyphicon-chevron-down"></span> Change Log
				</div>
				<div class="expander changesExpander">
					@include('core::admin.changes.log')
				</div>{{-- Changes Expander --}}
			@endif
		</div>{{-- Right Column --}}
	</div>{{-- Row --}}
	<div class="text-right pad">
		<input type="submit" class="btn btn-primary" value="Save" />
	</div>
	{{ Form::close() }}
@stop
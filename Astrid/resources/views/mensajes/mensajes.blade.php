
@if (Session::has('create'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-success" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>{{Session::get('create')}}</strong>
			</div>
		</div>
	</div>
@endif

@if (Session::has('store'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-success" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<strong>{{Session::get('store')}}</strong>
			</div>
		</div>
	</div>
@endif

@if (Session::has('edit'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-success" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<strong>{{Session::get('edit')}}</strong>
			</div>
		</div>
	</div>
@endif

@if (Session::has('update'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-success" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<strong>{{Session::get('update')}}</strong>
			</div>
		</div>
	</div>
@endif

@if (Session::has('delete'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-danger" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<strong>{{Session::get('delete')}}</strong>
			</div>
		</div>
	</div>
@endif

@if (Session::has('estado'))
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="alert alert-warning" role='alert'>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				<strong>{{Session::get('estado')}}</strong>
			</div>
		</div>
	</div>
@endif









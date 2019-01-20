@extends ('layouts.admin') 
@section ('contenido')

@include('mensajes.mensajes')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pedidos</h3>
		@include('pedido.search')
	</div>
</div><br></br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Fecha Entrega</th>
					<th>Hora Entrega</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($pedidos as $ped)
				<tr>
					<td>{{ $ped->idpedido}}</td>
					<td>{{ $ped->nombre}}</td>
					<td>{{ $ped->telefono}}</td>
					<td>{{ $ped->fechaentrega}}</td>
					<td>{{ $ped->horaentrega}}</td>
					@if($ped->estado=='1') 
                       <td><p style="color:#239B56";>Entregado</p></td>
                      @else
                         @if($ped->estado=='0')
                           <td><p style="color:red;">Pendiente</p></td>
                         @endif   
                    @endif
					<td>
                        <a href="{{URL::action('PedidoController@estado',$ped->idpedido)}}"><button class="btn-xs btn-success">Estado</button></a>
                        <a href="{{URL::action('PedidoController@show',$ped->idpedido)}}"><button class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-list-alt"></i> Detalles</button></a>
					</td>
				</tr>

				@endforeach
			</table>
		</div>
		{{$pedidos->render()}}
	</div>
</div>

@endsection

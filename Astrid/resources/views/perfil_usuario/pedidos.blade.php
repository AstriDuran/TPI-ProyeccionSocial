@extends('layouts.user')
@section('title', 'Perfil User')
@section('contenido')

    <div class="form-horizontal col-md-4 col-md-offset-4">
         <h2> <b>Listado de Pedidos</b></h2> 
    </div>
    <div class="form-horizontal col-md-12"><br>
      <div class="panel panel-primary">
        <div class="panel-heading" style="background: black" ><b> Pedidos. </b></div>
          <div class="panel-body">
            <div class="col-md-12">
              
    			   <br></br>

        		<div class="table-responsive">
        			<table class="table table-striped table-bordered table-condensed table-hover">
        				<thead style="background-color: #A9D0F5">
        					<th>Cliente</th>
        					<th>Telefono</th>
        					<th>Fecha Entrega</th>
        					<th>Hora Entrega</th>
        					<th>Estado</th>
                  <th>Direccion</th>
        					<th>Opciones</th>
        				</thead>
                       @foreach ($pedidos as $ped)
        				<tr>
        					<td>{{ $ped->nombre}}</td>
        					<td>{{ $ped->telefono}}</td>
        					<td>{{ $ped->fechaentrega}}</td>
        					<td>{{ $ped->horaentrega}}</td>
                  <td>{{ $ped->direccion}}</td>
        					@if($ped->estado=='1') 
                      <td><p style="color:#239B56";>Estregado</p></td>
                      @else
                         @if($ped->estado=='0')
                           <td><p style="color:red;">Pendiente</p></td>
                         @endif   
                      @endif
        					<td>
                      <a href="{{URL::action('PedidoUserController@show',$ped->idpedido)}}">
                      <button class="btn btn-success"> <i class="fa fa-user"> </i> Detalles</button></a>
        					</td>
        				</tr>

        				@endforeach
        			</table>
        		</div>
            {{$pedidos->render()}}
          </div>
        </div>
      </div>
    </div>

@endsection

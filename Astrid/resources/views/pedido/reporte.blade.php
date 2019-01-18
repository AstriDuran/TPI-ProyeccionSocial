<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalle del Pedido.</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ public_path()}}/admin/css/reportes.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid"> 
<!--Contenido -->
	<div class="col-lg-12">
	    <div class="row-fluid">
	    	<div id="logo">
        		@if(is_file(public_path().'/img/logo2.jpg'))
        			<div class="foto">
            			<img src="{{ public_path()}}/img/logo2.jpg" height="810px" width="810px" class="img-thumbnail">
        			</div>
        		@else
        			<div class="foto">
            			<img src=""  class="img-thumbnail">
        			</div>
        		@endif
    		</div>

    		@foreach($pedido as $ped)
    		@endforeach
 
    		<div  id="contenedor">
    			<div>
    				<h5>Fecha: {{$fecha}}</h5>
    				<h5>Usuario: {{$ped->nombre}}</h5>
    			</div>
		    	<div class="encabezado" id="encabezado">	
              		<h3>Detalles del Pedido.</h3> 
		    	</div>
		 	</div>

	    	<div class="panel-heading">
	    		<h4>Datos del Usuario.</h4>
	    	</div>

	    	<!-- /.panel-heading -->
	    	<div style="overflow-x:auto;">
	    		<div class="table table-striped table-bordered table-condensed table-hover">
	    			<table class="table" id="tablanommina">
			    		<thead style="background-color: #A9D0F5">
			    			<tr>
				    		    <th>Teléfono</th>
				    		    <th>Fecha Entrega</th>
				    		    <th>Hora Entrega</th>
				    		    <th>Direccion de Entrega</th>
				    		    <th>Estado Pedido</th>
			    			</tr>
			    		</thead>
			    		<tfoot>
			    		</tfoot>
			    		<tbody>
			    		  <tr>
			    		      <td>{{$ped->telefono}}</td>
			    		      <td>{{$ped->fechaentrega}}</td>
			    		      <td>{{$ped->horaentrega}}</td>
			    		      <td>{{$ped->direccion}}</td>

			    		      @if($ped->estado=='0')
			    		        <td><p style="color:red;">Pendiente</p></td>
			    		          @else
			    		              <td><p style="color:#239B56";>Entregado</p></td>   
			    		      @endif
			    		  </tr>
			    		  
			    		</tbody>
	    			</table>
	    		</div>
	    		<!-- /.table-responsive -->
	    		<br>
	    		<div class="panel-heading">
	    			<h4>Resumen del Pedido.</h4>
	    		</div>

	    		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    		    <table class="table table-striped table-bordered table-condensed table-hover" id="tabladetalles" >
	    		        <thead style="background-color: #A9D0F5">
	    		        	<tr>
		    		            <th>N°</th>
		    		            <th>Codigo</th>
		    		            <th>Producto</th>
		    		            <th>Detalles</th>
		    		            <th>Cantidad</th>
		    		            <th>Precio</th>
		    		            <th>Subtotal</th>
	    		            </tr>
	    		        </thead>
	    		        <tfoot>
	    		        </tfoot>
	    		        <tbody>
	    		          @foreach($pedido as $ped)
	    		          <tr>
	    		              <td>{{$ped->iddetalle}}</td>
	    		              <td>{{$ped->codigo}}</td>
	    		              <td>{{$ped->producto}}</td>
	    		              <td>{{$ped->detalles}}</td>
	    		              <td>{{$ped->cantidad}}</td>
	    		              <td>{{$ped->precioventa}}</td>
	    		              <td>{{$ped->subtotal}}</td>
	    		          </tr>
	    		          @endforeach
	    		          <tr>
	    		              <td></td>
	    		              <td></td>
	    		              <td></td>
	    		              <td></td>
	    		              <td></td>
	    		              <td><b>Total:</b></td>
	    		              <td><b>{{$ped->montototal}}</b></td>
	    		          </tr>
	    		        </tbody>
	    		    </table>  
	    		</div>

				<div class="col-lg-3 col-md-6 col-sm-8 col-xs-12">
			
				</div> 
	   		 </div>
      	</div>
   	</div>              
	<!-- Fin Contenido-->

</div>
</body>
</html>
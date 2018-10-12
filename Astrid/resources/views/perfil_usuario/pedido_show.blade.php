@extends('layouts.user')
@section('title', 'Perfil Usuario')
@section('contenido')

  <div class="form-horizontal col-md-4 col-md-offset-4">
        <h2> <b>Detalles del Pedido</b></h2> 
  </div>
    <div class="form-horizontal col-md-12"><br>
      <div class="panel panel-primary">
        <div class="panel-heading" style="background: black" ><b> Pedidos. </b></div>
          <div class="panel-body">
            <div class="col-md-12">

            <br>
            
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table class="table table-striped table-bordered table-condensed table-hover" id="tabladetalles" >
                      <thead style="background-color: #A9D0F5">
                          <th>Cliente</th>
                          <th>Telefono</th>
                          <th>Fecha Entrega</th>
                          <th>Hora Entrega</th>
                          <th>Direcciom</th>
                          <th>Estado Pedido</th>
                          <th>Monto Total</th>
                      </thead>
                      <tfoot>
                      </tfoot>
                      <tbody>
                        @foreach($pedido as $ped)
                        @endforeach
                        <tr>
                            <td>{{$ped->nombre}}</td>
                            <td>{{$ped->telefono}}</td>
                            <td>{{$ped->fechaentrega}}</td>
                            <td><input type="time" class="form-control" name="horaentrega" value="{{$ped->horaentrega}}" readonly="readonly" ></td>
                            <td>{{$ped->direccion}}</td>

                            @if($ped->estado=='0')
                              <td><p style="color:red;">Pendiente</p></td>
                                @else
                                <td><p style="color:#239B56";>Entregado</p></td>   
                            @endif
                            <td>{{$ped->montototal}}</td>
                        </tr>
                        
                      </tbody>
                  </table>  
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <table class="table table-striped table-bordered table-condensed table-hover" id="tabladetalles" >
                      <thead style="background-color: #A9D0F5">
                          <th>N°</th>
                          <th>Codigo</th>
                          <th>Producto</th>
                          <th>Detalles</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Subtotal</th>
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
                            <td><b></b>{{$ped->montototal}}</td>
                        </tr>
                      </tbody>
                  </table>  
              </div>

   

              <div class="row ccol-lg-12">
               <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-xs-12" id="btn_guardar"> 
                  <div class="form-group">
                    <a href="{{route('usuario.pedido',Auth::user()->id)}}" class="btn btn-danger" role="button">
                    <i class="glyphicon glyphicon-arrow-left"></i> Regresar</a>
                  </div> 
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="btn_guardar"> 
                  <div class="form-group">
                    <a href="{{route('usuario.pedido.reporte',$ped->idpedido)}}" class="btn btn-success" role="button">
                    <i class="glyphicon glyphicon-save-file"></i> Generar PDF</a>
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
  </div>

 
@endsection

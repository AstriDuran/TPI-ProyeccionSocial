<!DOCTYPE html>
<html>
  <head>
    <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 90%;
          color: #000000;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: center;
          padding: 5px;
          width: 60px;
          color: #000000;
      }
      h4{
        color: #000000;
      }
      #direccion { width: 150px; }
      #mensaje{ font-weight: bold; }
  </style>

  </head>

  <body>
    <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   
      <div id="mensaje" >
          <h4> Hola,{{$usuario->username}}.</h4> 
          <h4> Su pedido se ha completado satisfactoriamente. A continuacion se muestran los datos proporcionados para la entrega.</h4>
      </div>

       <div class="table-responsive">
           <table>
             <thead style="background-color: #A9D0F5">
                <th>Telefono</th>
                <th>Fecha Entrega</th>
                <th>Hora Entrega</th>
                <th>Direccion de Entrega</th>
                
                <th>Ver Detalles</th>
            </thead>
        
            <tr>
              <td>{{ $usuario->telefono}}</td>
              <td>{{ $pedido->fechaentrega}}</td>
              <td>{{ $pedido->horaentrega}}</td>
              <td id="direccion">{{ $pedido->direccion}}</td>
             
              <td>       
                <a href="{{url('/usuario_pedido_show/'.$pedido->idpedido)}}" style="background: #3CD06D color: #ffffff"><button> Detalles</button> </a>
              </td>
            </tr>
          </table>

        </div>
        </div>
        </div>
    </div>
  </body>
</html>
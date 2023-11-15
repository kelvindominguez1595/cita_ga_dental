<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Historial del paciente</title>  
   
    
    <style>
        body {
            /* font-family: 'Arial', sans-serif; */
           font-family: verdana, sans-serif; 

            margin: 20px;
        }

        h1 {
            color: #0B6FA4;
        }

        h1 img {
            margin-right: 10px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e3eaed;
            padding: 15px; /* Añade espacio entre las celdas */
            text-align: left;
            width: 25%;
        }

        th {
            background-color: #0B6FA4;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #E6F7FF;
        }

        tr:nth-child(odd) {
            background-color: #B3E0FF;
        }
    </style>





    <style>
        table.paleBlueRows {
  font-family: "Times New Roman", Times, serif;
  border: 1px solid #FFFFFF;
  width: 100%;
  height: 200px;
  text-align: center;
  border-collapse: collapse;
}


table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: #D0E4F5;
}
table.paleBlueRows thead {
  background: #0B6FA4;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #333333;
  background: #D0E4F5;
  border-top: 3px solid #444444;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
    </style>
</head>
<body>
    <h1> <link href="{{ asset('img/brand/dental.png') }}" rel="icon" type="image/png">
        Historial del Paciente</h1>
    <table>
        <thead>
            <tr>
                <th colspan="4">Datos del Paciente</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Codigo de paciente:</strong></td>
                <td>{{$user->id}}</td>
                <td><strong>Nombre:</strong></td>
                <td>{{ $user->name}}</td>
            </tr>
            <tr>
                <td><strong>Correo:</strong></td>
                <td>{{ $user->email}}</td>
                <td><strong>DUI:</strong></td>
                <td>{{ $user->dui}}</td>
            </tr>
            <tr>
                <td><strong>Edad:</strong></td>
                <td>{{ $user->edad}}</td>
                <td><strong>Dirección:</strong></td>
                <td>{{ $user->address}}</td>
            </tr>
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $user->phone}}</td>
                <td><strong>Whatsapp:</strong></td>
                <td>{{ $user->whatsapp}}</td>
            </tr>
            <tr>
                <td><strong>Red social:</strong></td>
                <td>{{ $user->red_social}}</td>
                <td><strong>Música:</strong></td>
                <td>{{ $user->musica}}</td>
            </tr>
            <tr>
                <td><strong>Profesión:</strong></td>
                <td>{{ $user->profesion}}</td>
                <td><strong>Alteraciones:</strong></td>
                <td>{{ $user->alteraciones}}</td>
            </tr>
            <tr>
                <td><strong>Como lo conoció:</strong></td>
                <td>{{ $user->como_conocio}}</td>
                <td><strong>Historial:</strong></td>
                <td>{{ $user->historial}}</td>
            </tr>
        </tbody>
    </table>
    <p></p>
    <table class="paleBlueRows">
        <thead>
        <tr>
            <th>ID de Paciente</th>
            <th>Número de Diente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Doctor</th>
            <th>Observaciones</th>
        </tr>
        </thead>
   
        <tbody>
            @foreach ($chequeos as $chequeo)
        <tr>
            <td>
                @isset($chequeo->user)
                    {{ $chequeo->user->name }}
                @endisset
            </td>
            <td>{{ $chequeo->tooth_number }}</td>
            <td>{{ $chequeo->date }}</td>
            <td>{{ $chequeo->time }}</td>
            <td>
                @isset($chequeo->doctor_logueado)
                    {{ $chequeo->doctor_logueado->name }}
                @endisset
            </td>
            <td>{{ $chequeo->observaciones }}</td>
        </tr>
        <tr>
            <td colspan="6">Detalles</td>
        </tr>
        <tr>
            <th colspan="2">ID</th>
            <th>Número de Diente</th>
            <th colspan="2">Daño</th>
        </tr>
        @foreach ($chequeo->dientes as $item)
            
        <tr>
            <td colspan="2">{{ $item->id }}</td>
            <td>{{ $item->tooth_number }}</td>
            <td colspan="2">
                @if ($item->icono == 'circulo')
                    <div
                        style="margin-left:40%; border-radius: 50%; background-color: {{ $item->color }}; width: 5px; height:5px; padding: 5px;">
                    </div>
                @else
                    <label style="color: {{ $item->color }}; font-size: 14pt;"> 
                        {!! $item->icono !!}
                      
                    </label>
                @endif
            </td>
        </tr>

        @endforeach
        @endforeach
        </tbody>
        </table>
</body>
</html>
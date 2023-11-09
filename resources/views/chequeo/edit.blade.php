@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Listado </h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número de Diente</th>
                        <th>Daño</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($dientes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tooth_number }}</td>
                            <td>
                                @if ($item->icono == 'circulo')
                                    <div
                                        style="border-radius: 50%; background-color: {{ $item->color }}; width: 20px; height:20px; padding: 10px;">
                                    </div>
                                @else
                                    <label style="color: {{ $item->color }}; font-size: 14pt;"> {{ $item->icono }}</label>
                                @endif
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

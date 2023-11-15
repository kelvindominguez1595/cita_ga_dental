@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Historial</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="container" class="d-flex flex-column align-items-center">
                <div class="d-flex flex-wrap justify-content-between w-90 mb-3">
                    <!-- Buscador de Pacientes -->
                    <form action="{{ route('reportes.index') }}" method="get" target="_blank" class="d-flex align-items-center mb-3">
                        <input type="hidden" name="tipo" value="pdf">
                        <div class="form-group text-center mr-3">
                            <label for="searchPacientes" style="margin-bottom: 3;">Pacientes</label>
                            <input id="searchPacientes" type="text" class="form-control" placeholder="Buscar pacientes">
                            <input type="hidden" name="pacientes" id="selectedPatientId" value="">
                        </div>
                    </form>
                    

                    <!-- Contenedor para mostrar los resultados de la búsqueda -->
                    <div id="searchResults" class="mb-3">
                        <!-- Aquí se mostrarán los resultados de la búsqueda -->
                    </div>

                    <!-- Formulario para subir archivos -->
                    <form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data"
                        class="d-flex align-items-center mb-3">
                        @csrf
                        <div class="form-group mr-3">
                            <label for="file">Subir Archivo</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                    </form>
                </div>

                <!-- Botón de enviar -->
                <form action="{{ route('reportes.index') }}" method="get" target="_blank" class="mb-3">
                    <input type="hidden" name="tipo" value="pdf">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </form>

                <hr>

                {{-- <a href="{{ route('ver_historial', ['id' => $paciente->id]) }}" class="btn btn-info">Ver Historial</a> --}}

                <script>
                    const searchPacientes = document.getElementById('searchPacientes');
                    const searchResultsContainer = document.getElementById('searchResults');

                    searchPacientes.addEventListener('input', async function() {
                        const searchValue = searchPacientes.value;

                        try {
                            const response = await fetch(`/pacientes/search?name=${searchValue}`);
                            const pacientesData = await response.json();

                            // Limpiar el contenido anterior en el contenedor de resultados
                            searchResultsContainer.innerHTML = '';

                            // Mostrar los resultados de búsqueda
                            pacientesData.forEach(paciente => {
                                const resultItem = document.createElement('div');
                                resultItem.textContent = paciente.name; // Ajusta según la estructura de tus datos
                                resultItem.addEventListener('click', function() {
                                    // Puedes hacer algo al hacer clic en un resultado, por ejemplo, redirigir a la página del paciente
                                    window.location.href = `/pacientes/${paciente.id}/historial`;
                                });
                                searchResultsContainer.appendChild(resultItem);
                            });
                        } catch (error) {
                            console.error('Error al realizar la búsqueda:', error);
                        }
                    });
                </script>

                <!-- Aquí se mostrará el historial del paciente -->
                <!-- Asegúrate de agregar el código para mostrar el historial del paciente -->
            </div>
        </div>
    </div>

    
    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Incluye los archivos CSS y JS de select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

    <!-- Código JavaScript personalizado -->
    <script>
        $(document).ready(function () {
            // Resto del código JavaScript ...
        });
    </script>
@endsection

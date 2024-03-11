<x-layouts.appAdmin
    :title="'DC-ADMIN-agregarCandidatos'"
    :metadescription="'Sistema DEMOCRACAST administrador crear elecciones'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
<div class="superior"><h1>AGREGAR CANDIDATOS</h1></div>
<div class="fondoCreacion">
    <div class="fElecciones formulario">
        <h1>CANDIDATOS</h1>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="buscar por apellido, nombre, ci" aria-label="name" aria-describedby="basic-addon1" id="name" name="name">
            <button type="button" class="btn btn-primary ml-12" data-bs-toggle="modal" data-bs-target="#crearCandidato">CREAR</button>
          </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="tabla-header">
                    <tr>
                      <th scope="col" class="ci">CI</th>
                      <th scope="col" class="nombre">NOMBRE</th>
                      <th scope="col" class="apePaterno">AP.PATERNO</th>
                      <th scope="col" class="apeMaterno">AP.MATENRO</th>
                      <th scope="col" class=""></th>
                    </tr>
                  </thead>
                <tbody>
                  @foreach ( $personas as $persona )
                  <tr>
                    <th scope="row" class="ci">{{ $persona->id }}</th>
                    <td class="nombre">{{ $persona->nombre }}</td>
                    <td class="apePaterno">{{ $persona->apePaterno }}</td>
                    <td class="apeMaterno">{{ $persona->apeMaterno }}</td>
                    <td class="">
                        <form method="POST" action="{{ route('admin.storeCandidato', $eleccion->id ) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $persona->id }}" style="display: none" id="idPersona" name="idPersona">
                            <button type="submit" class="btn btn-primary">AGREGAR</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="rayaVertical"></div>
    <div class="llenadoCandidatos">
        <div class="candidato">
            <div class="row row-cols-1 row-cols-md-auto g-4">
                @foreach ( $eleccion->candidatos as $candidato )
                <div class="col">
                    <div class="card h-100">
                        <span class="numero">
                            {{ $candidato->pivot->nroCartelera }}
                            <form method="POST" action="{{ route('admin.destroyCandidato' ) }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="eleccionId" id="eleccionId" value="{{ $candidato->pivot->eleccion_id }}" style="display: none">
                                <input type="text" name="personaId" id="personaId" value="{{ $candidato->pivot->persona_id }}" style="display: none">
                                <button type="submit">ELIMINAR</button>
                            </form>
                        </span>
                      <img src="/img/user/usuario.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{ $candidato->nombre }}</h5>
                      </div>
                    </div>
                  </div>
                @endforeach

            </div>
        </div>
        <div class="candidatoF d-flex justify-content-center">
            <a href="{{ route('admin.editarElecciones', $eleccion->id) }}" class="btn btn-primary ">FINALIZAR</a>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="crearCandidato" tabindex="-1" aria-labelledby="crearCandidatoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creacion de Candidato</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.storeCPersona', $eleccion->id ) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Ci</span>
                    <input type="text" class="form-control" placeholder="CI" id="ci" name="ci" aria-label="ci" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" aria-label="nombre" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Apellido Paterno</span>
                    <input type="text" class="form-control" placeholder="apellido paterno" id="apePaterno" name="apePaterno" aria-label="apellidoPaterno" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Apellido Materno</span>
                    <input type="text" class="form-control" placeholder="apellido materno" id="apeMaterno" name="apeMaterno" aria-label="apellidoMaterno" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar y Agregar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  $(document).ready(function () {
    // Manejar el evento de cambio en el input de búsqueda
    $("#name").on("input", function () {
      // Obtener el valor del input de búsqueda
      var searchText = $(this).val().toLowerCase();

      // Filtrar las filas de la tabla
      $("tbody tr").filter(function () {
        // Obtener el texto de cada celda en la fila
        var ci = $(this).find(".ci").text().toLowerCase();
        var nombre = $(this).find(".nombre").text().toLowerCase();
        var apePaterno = $(this).find(".apePaterno").text().toLowerCase();
        var apeMaterno = $(this).find(".apeMaterno").text().toLowerCase();

        // Mostrar u ocultar la fila según la coincidencia con el texto de búsqueda
        $(this).toggle(
          ci.includes(searchText) ||
          nombre.includes(searchText) ||
          apePaterno.includes(searchText) ||
          apeMaterno.includes(searchText)
        );
      });
    });
  });
</script>

</x-layouts.appAdmin>


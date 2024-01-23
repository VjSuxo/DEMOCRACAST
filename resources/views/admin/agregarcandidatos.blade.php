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
          </div>
        <table class="table">
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
                <td class=""><a href="#" class="agregar"
                    data-id="{{ $persona->id }}"
                    data-nombre="{{ $persona->nombre }}"
                    data-apPat="{{ $persona->apePaterno }}"
                    data-apMat="{{ $persona->apeMaterno }}"
                    >AGREGAR</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="rayaVertical"></div>
    <div class="llenadoCandidatos">
        <div class="candidato">
            <div class="card" style="width: 18rem;">
                <img src="/img/user/usuario.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">CI: <span class="ci"></span></p>
                    <p class="card-text">Nombre: <span class="nombre"></span></p>
                    <form action="{{ route('admin.storeCandidato',$eleccion) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="ciVal" style=" display: none " name="idPersona" id="idPersona">
                    <button type="submit"  class="btn btn-primary">AGREGAR</button>
                    </form>
                </div>
              </div>
        </div>
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

    $(".agregar").click(function (event) {
            // Prevenir el comportamiento predeterminado del enlace
            event.preventDefault();

            var userId = $(this).data("id");
            var userNombre = $(this).data("nombre");
            var userapPat = $(this).data("apPat");
            var userapMat = $(this).data("apMat");

            var usuario = {
                id: userId,
                ci:  userId,
                nombre: userNombre,
                apePaterno: userapPat,
                apeMaterno: userapMat,
            };

            // Rellenar los marcadores de posición en la card con los datos del usuario
            $(".ci").text(usuario.ci);
            $(".ciVal").val(usuario.ci);
            $(".nombre").text(usuario.nombre);
        });


  });
</script>

</x-layouts.appAdmin>


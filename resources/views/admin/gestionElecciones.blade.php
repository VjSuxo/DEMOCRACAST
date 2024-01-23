<x-layouts.appAdmin
    :title="'DC-ADMIN-ELECCIONES'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
    <div class="superior"><h1>GESTION DE ELECCIONES</h1></div>
    <div class="botonesO">
        <a class="btn btn-primary" href="{{ route('admin.crearElecciones') }}">CREAR ELECCION</a>
    </div>
    <div class="contenido">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">ESTADO</th>
                <th scope="col">DETALLE</th>
                <th scope="col">ESTADISTICAS</th>
                <th scope="col">EDITAR</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $elecciones as $eleccion )
                <tr>
                    <th scope="row">{{ $eleccion->id }}</th>
                    <td>{{ $eleccion->nombreEle }}</td>
                    <td>{{ $eleccion->estado }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-id="{{ $eleccion->id }}"
                            data-nombre="{{ $eleccion->nombreEle }}"
                            data-estado="{{ $eleccion->estado }}"
                            data-descrip="{{ $eleccion->descripcion }}"
                        >
                            Ver
                        </button>
                      </td>
                    <td><button type="button" class="btn btn-primary">Primary</button></td>
                    <td><a class="btn btn-primary" href="{{ route('admin.editarElecciones',$eleccion->id) }}" >EDITAR</a></td>
                </tr>
              @endforeach

            </tbody>
        </table>
    </div>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles de la Elección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre:</strong> <span id="nombreEleccion"></span></p>
                <p><strong>Estado:</strong> <span id="estado"></span></p>
                <p><strong>Descripción:</strong> <span id="descripcion"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#nombreEleccion').text(button.data('nombre'));
            $('#estado').text(button.data('estado'));
            $('#descripcion').text(button.data('descrip'));
        });

    });
</script>


</x-layouts.appAdmin>

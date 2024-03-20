<x-layouts.appAdmin
    :title="'DC-ADMIN-ELECCIONES'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css','resources/css/style_estado.css',])
<div class="contenedor">
    <div class="superior"><h1>GESTION DE ELECCIONES</h1></div>
    <div class="botonesO">
        <a class="btn btn-primary" href="{{ route('admin.crearElecciones') }}">CREAR ELECCION</a>
    </div>
    <div class="contenido">
        <div class="row row-cols-1 row-cols-md-auto g-4">
            @foreach ( $elecciones as $eleccion )
            <div class="col">
                <div class=" shadow card border-success mb-3" style="width: 30vh;">
                    <div class="card-header bg-transparent border-success d-flex justify-content-between align-items-center">
                        <span class="me-auto">{{ $eleccion->nombreEle }}</span>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('admin.eleccion.estats', $eleccion) }}">Votos</a></li>
                                <li><a class="dropdown-item" href="#">Elección</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body text-success">
                        <a class="btn btn-primary" href="{{ route('admin.editarElecciones',$eleccion->id) }}">Gestionar</a>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        @if ($eleccion->estado == 'activo')
                            <h5 class="punto-verde">activo</h5>
                        @else
                            <h5 class="punto-rojo">finalizado</h5>
                        @endif
                    </div>

                  </div>
              </div>
            @endforeach
        </div>
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

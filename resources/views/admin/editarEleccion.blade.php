<x-layouts.appAdmin
    :title="'DC-ADMIN-ELECCIONES-gestionar'"
    :metadescription="'Sistema DEMOCRACAST administrador crear elecciones'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
<div class="superior"><h1>MAKE ELECCIONES</h1></div>
<div class="fondoCreacion">
    <div class="fElecciones formulario">
        <h1>Eleccion</h1>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <button type="button" class="btn btn-primary" id="btn">Primary</button>
        </div>

        <div class="datos"  style="display: none">
            datos
        </div>
        <div class="editDatos" style="display: none">
            <input type="text" >
        </div>
        <div class="est"   style="display: none">
            estadistiacs
        </div>

    </div>
    <div class="rayaVertical"></div>
    <div class="llenadoCandidatos">
        <a  class="btn btn-primary" href="{{ route('admin.gCandidatos',$eleccion) }}">AGREGAR CANDIDATOS</a>
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
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
    $('#btnData').click(function(){
        $('.datos').show();
    });
});

</script>

</x-layouts.appAdmin>





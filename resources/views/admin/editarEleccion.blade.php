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
            <button type="button" class="btn btn-primary" id="btnDatos">Datos</button>
            <button type="button" class="btn btn-primary" id="btnEst">Estadisticas</button>
            <a type="button" href="{{ route('admin.eleccion.estats', $eleccion) }}" class="btn btn-primary" id="btnPant" style="display: none">Pantalla Completa</a>
        </div>

        <div class="container mt-2 ">
            <div class="datos text-center"  style="display: none">
                <h2 class="">Informacion</h2>
                <hr>
                <article class="item">
                    <p class="dataTipo">Nombre :</p><p class="dataInf">{{ $eleccion->nombreEle }}</p>
                    <p class="dataTipo">Fecha Inicio :</p><p class="dataInf">{{ $eleccion->fechaInicio }}</p>
                    <p class="dataTipo">Fecha Finalizacion :</p><p class="dataInf">{{ $eleccion->fechaFin }}</p>
                    <p class="dataTipo">Cantidad de Candidatos :</p><p class="dataInf">{{ count($eleccion->candidatos) }}</p>
                    <p class="dataTipo">Cantidad de Votos :</p><p class="dataInf">{{ $totalVotos }}</p>
                </article>
            </div>
            <div class="est"   style="display: none">


                <div class="barras"></div>
                <div class="cards">
                    <div class="candidato">
                        <div class="row row-cols-1 row-cols-md-auto g-4">
                            @foreach ( $eleccion->candidatos as $candidato )
                            <div class="col">
                                <div class="card h-100">
                                    <span class="numero">
                                        Numero Cartelera: {{ $candidato->pivot->nroCartelera }}
                                    </span>
                                  <img src="/img/user/usuario.png" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">Nombre :{{ $candidato->nombre }}</h5>
                                    <h5 class="card-title">Votos :{{ $candidato->cantVotos }}</h5>
                                  </div>
                                </div>
                              </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
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
    $('#btnDatos').click(function(){
        $('.datos').show(1000);
        $('.est').hide(1000);
        $('#btnPant').hide(1000);
    });
    $('#btnEst').click(function(){
        $('.datos').hide(1000);
        $('#btnPant').show(1000);
        $('.est').show(1000);
    });
});

</script>

</x-layouts.appAdmin>





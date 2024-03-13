<x-layouts.app
    :title="'DEMOCRACAST'"
    :metadescription="'Inicio del sistema DEMOCRACAST'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css'])
<div class="contenedor">
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


</x-layouts>

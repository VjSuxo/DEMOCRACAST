<x-layouts.app
    :title="'DEMOCRACAST'"
    :metadescription="'Inicio del sistema DEMOCRACAST'"
>
@vite(['resources/css/style_voto.css',])
<div class="contenedor">
    <div class="tarjetas">
        <div class="row row-cols-1 row-cols-md-auto g-4" style="max-height: 800px; overflow-y: auto;">
            @foreach ( $eleccion->candidatos as $candidato )
            <div class="col">
                <div class="card">
                    <span class="numero">{{ $candidato->pivot->nroCartelera }}</span>
                    <img src="/img/user/usuario.png" class="card-img-top img-thumbnail" alt="...">

                    <div class="card-body text-center align-items-center">
                        <h5 class="card-title">{{ $candidato->nombre }}</h5>
                        <a class="btn btn-secondary" href="{{ route('elegirA',[$eleccion->id,$candidato->id] ) }}">VOTAR</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
</x-layouts>

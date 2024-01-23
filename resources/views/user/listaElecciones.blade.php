<x-layouts.app
    :title="'DEMOCRACAST'"
    :metadescription="'Inicio del sistema DEMOCRACAST'"
>
@vite(['resources/css/style_voto.css',])
<div class="contenedor">
    <div class="tarjetas">
        <div class="row row-cols-1 row-cols-md-auto g-4" style="max-height: 800px; overflow-y: auto;">
            @foreach ( $elecciones as $eleccion )
            <div class="col">
                <div class="card">
                    <div class="card-body text-center align-items-center">
                        <h5 class="card-title">{{ $eleccion->nombreEle }}</h5>

                        <a class="btn btn-secondary" href="{{ route('elecciones',[$eleccion->id]) }}">ENTRAR</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>


</x-layouts>

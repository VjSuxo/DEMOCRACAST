<x-layouts.app
    :title="'DEMOCRACAST'"
    :metadescription="'Inicio del sistema DEMOCRACAST'"
>
@vite(['resources/css/style_voto.css'])
<div class="contenedor">
    @include('sweetalert::alert')
    <div class="tarjetas">
        <div class="row row-cols-1 row-cols-md-auto g-4" style="max-height: 700px; overflow-y: auto;">

            @foreach ($eleccion->candidatos as $candidato)
                <div class="col mb-4">
                    <div class="card text-center">
                        <span class="numero">{{ $candidato->pivot->nroCartelera }}</span>
                        <img src="/img/user/usuario.png" class="img-fluid img-thumbnail" alt="...">

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $candidato->nombre }}</h5>
                            <h5>Votos : {{ $candidato->pivot->cantVotos }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


</div>
<script>
    // Función para recargar la página
    function recargarPagina() {
      location.reload();
    }

    // Llamar a la función cada 20 segundos (20,000 milisegundos)
    //setInterval(recargarPagina, 5000);
  </script>
</x-layouts>

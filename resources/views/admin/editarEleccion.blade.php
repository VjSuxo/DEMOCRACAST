<x-layouts.appAdmin
    :title="'DC-ADMIN-ELECCIONES-gestionar'"
    :metadescription="'Sistema DEMOCRACAST administrador crear elecciones'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
<div class="superior"><h1>MAKE ELECCIONES</h1></div>
<div class="fondoCreacion">
    <div class="fElecciones formulario">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>DATOS ELECCION</h1>

            <button type="submit" class="btn btn-secondary" {{ $errors->any() ? 'disabled' : '' }}>CREAR</button>
        </form>

    </div>
    <div class="rayaVertical"></div>
    <div class="llenadoCandidatos">
        <a  class="btn btn-primary" href="{{ route('admin.gCandidatos',$eleccion) }}">AGREGAR CANDIDATOS</a>
        <div class="candidato">
            <div class="row row-cols-1 row-cols-md-auto g-4">
                @foreach ( $eleccion->candidatos as $candidato )
                <div class="col">
                    <div class="card h-100">
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


</x-layouts.appAdmin>





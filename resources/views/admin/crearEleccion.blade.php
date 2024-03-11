<x-layouts.appAdmin
    :title="'DC-ADMIN-ELECCIONES-crear'"
    :metadescription="'Sistema DEMOCRACAST administrador crear elecciones'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
    <div class="superior"><h1>MAKE ELECCIONES</h1></div>
    <div class="fondoCreacionPP">
        <form action="{{ route('admin.crearElecciones.Store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>DATOS ELECCION</h1>
            <div class="input-group mb-3">
                <span class="input-group-text" id="nombre_Eleccion">Nombre Eleccion</span>
                <input type="text" class="form-control" placeholder="Nombre Eleccion" aria-label="nombre_Eleccion" aria-describedby="nombre_Eleccion" name="nombreEle" id="nombreEle" value="{{ old('nombreEle') }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="fecha-eleccion">Fecha Eleccion</span>
                <input type="date" class="form-control" placeholder="" aria-label="fecha-eleccion" aria-describedby="fecha-eleccion" name="fechaInicio" id="fechaInicio" value="{{ old('fechaInicio') }}">
            </div>
            <div class="input-group">
                <span class="input-group-text">Descripcion</span>
                <textarea class="form-control" aria-label="descripcion" id="descripcion" name="descripcion" value=" ">{{ old('descripcion') }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary">CREAR</button>
        </form>
    </div>
</div>

</x-layouts.appAdmin>

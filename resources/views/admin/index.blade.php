<x-layouts.appAdmin
    :title="'DEMOCRACAST-ADMIN'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css',])
@vite(['resources/css/style_indexAdmin.css',])
<div class="contenedor">
    <div class="titulo">
        <h1>DEMOCRACAST</h1>
        <div class="barra"></div>
        <p>Sistema de votacion electronica</p>
        <h2>ADMINISTRADOR</h2>
    </div>
    <div class="opciones">
        <div class="opcion opcion1"><a href="{{ route('admin.gElecciones') }}">GESTION ELECCIONES</a></div>
        <div class="opcion opcion2"><a href="{{ route('admin.gUsuarios') }}">GESTION USUARIOS</a></div>
    </div>
</div>

</x-layouts.appAdmin>

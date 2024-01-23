<x-layouts.appAdmin
    :title="'DC-ADMIN-USUARIOS'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
    <div class="superior"><h1>GESTION DE USUARIOS</h1></div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">CI</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">DETALLES</th>
            <th scope="col">ELIMINAR</th>
            <th scope="col">AUDITORIA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">111111</th>
            <td>Nombre Nombre Apellido Apellido</td>
            <td><button type="button" class="btn btn-primary">Primary</button></td>
            <td><button type="button" class="btn btn-primary">Primary</button></td>
            <td><button type="button" class="btn btn-primary">Primary</button></td>
          </tr>

        </tbody>
      </table>

</div>

</x-layouts.appAdmin>

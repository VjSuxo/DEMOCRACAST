<x-layouts.appAdmin
    :title="'DC-ADMIN-USUARIOS'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
    <div class="superior"><h1>GESTION DE USUARIOS</h1></div>
    <div class="ope">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            CREAR USUARIO
        </button>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">REGISTRO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.storePersona') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Columna izquierda - Datos de la Persona -->
                        <div class="col-md-6">
                            <label for="basic-url" class="form-label">Datos de la Persona</label>
                            <!-- ... campos de persona ... -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Ci</span>
                                    <input type="text" class="form-control" placeholder="0000000" aria-label="ci" aria-describedby="ci" id="ci" name="ci">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Nombre</span>
                                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nombre" name="nombre">
                                </div>
                                <label for="basic-url" class="form-label">Apellidos</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Paterno</span>
                                    <input type="text" class="form-control" placeholder="Paterno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ApPaterno" name="ApPaterno">
                                    <span class="input-group-text" id="basic-addon2">Materno</span>
                                    <input type="text" class="form-control" placeholder="Materno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ApMaterno" name="ApMaterno">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Foto Pesona</label>
                                    <input type="file" class="form-control" id="fotoP" name="fotoP">
                                </div>
                        </div>
                        <!-- Columna derecha - Datos de Usuario -->
                        <div class="col-md-6 border-start">
                            <label for="basic-url" class="form-label">Datos Usuario (Llenar datos si la persona tendrá acceso al sistema)</label>
                            <!-- ... campos de usuario ... -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Nombre Usuario</span>
                                <input type="text" class="form-control" placeholder="usuario" aria-label="Recipient's username" aria-describedby="basic-addon2" id="username" name="username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Contraseña</span>
                                <input type="text" class="form-control" placeholder="contraseña" aria-label="Recipient's username" aria-describedby="basic-addon2" id="password" name="password">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                <select class="form-select" id="rol" name="rol">
                                    <option selected value="-1">Elige</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Controlador</option>
                                    <option value="3">Elector</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                </div>
            </form>
        </div>
    </div>
</div>


   <div class="table-responsive ">
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
            @foreach ( $personas as $persona )
                <tr>
                    <th scope="row">111111</th>
                    <td>Nombre Nombre Apellido Apellido</td>
                    <td><button type="button" class="btn btn-primary">Primary</button></td>
                    <td><button type="button" class="btn btn-primary">Primary</button></td>
                    <td><button type="button" class="btn btn-primary">Primary</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>


</div>

</x-layouts.appAdmin>

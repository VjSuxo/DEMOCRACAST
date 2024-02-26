<x-layouts.appAdmin
    :title="'DC-ADMIN-USUARIOS'"
    :metadescription="'Sistema DEMOCRACAST administrador'"
>
@vite(['resources/css/style_index.css','resources/css/style_admin.css',])
<div class="contenedor">
    <div class="superior"><h1>GESTION DE USUARIOS</h1></div>
    <div class="ope">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal">
            CREAR USUARIO
        </button>
    </div>

<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModal" aria-hidden="true">
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
                            <label class="form-label">Datos de la Persona</label>
                            <!-- ... campos de persona ... -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="ci-label">Ci</span>
                                    <input type="text" class="form-control" placeholder="0000000" aria-label="ci" aria-describedby="ci" id="ci" name="ci">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Nombre</span>
                                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nombre" name="nombre">
                                </div>
                                <label class="form-label">Apellidos</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Paterno</span>
                                    <input type="text" class="form-control" placeholder="Paterno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ApPaterno" name="ApPaterno">
                                    <span class="input-group-text" id="basic-addon2">Materno</span>
                                    <input type="text" class="form-control" placeholder="Materno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="ApMaterno" name="ApMaterno">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" >Foto Pesona</label>
                                    <input type="file" class="form-control" id="fotoP" name="fotoP">
                                </div>
                        </div>
                        <!-- Columna derecha - Datos de Usuario -->
                        <div class="col-md-6 border-start">
                            <label class="form-label">Datos Usuario</label>
                            <!-- ... campos de usuario ... -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Contraseña</span>
                                <input type="text" class="form-control" placeholder="contraseña" aria-label="Recipient's username" aria-describedby="basic-addon2" id="password" name="password">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" >Cargo</label>
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

<div class="modal fade" id="datosModal" tabindex="-1" aria-labelledby="datosModal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">DATOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Datos -->
            <div class="datosP">
                <div class="modal-body">
                    <div class="row">
                        <!-- Columna izquierda - Datos de la Persona -->
                        <div class="col-md-6">
                            <!-- ... campos de persona ... -->
                            <div>

                                <p id="person-foto-display"></p>
                            </div>
                                <div class="input-group mb-3">
                                    <label  class="form-label">Ci :&nbsp; </label>
                                    <p><span id="person-id-display">0000</span></p>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="form-label">Nombre :&nbsp; </label>
                                    <p> <span id="person-nombre-display">0000</span></p>
                                </div>
                                <div class="input-group mb-3">
                                    <label  class="form-label">Apellidos :&nbsp; </label>
                                    <p> <span id="person-apePaterno-display">0000</span> <span id="person-apeMaterno-display">0000</span></p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" id="editarPersona">Editar Datos</button>
                </div>
            </div>
            <!-- Fin datos-->
            <!-- Inicio editar datos -->
            <form method="POST" action="{{ route('admin.storePersona') }}" enctype="multipart/form-data" id="formularioEditP" style=" display: none ">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Columna izquierda - Datos de la Persona -->
                        <div class="col-md-6">
                            <label class="form-label">Datos de la Persona</label>
                            <!-- ... campos de persona ... -->
                                <div class="input-group mb-3"  style="display: none">
                                    <span class="input-group-text" id="basic-addon1">Ci</span>
                                    <input type="text" class="form-control" placeholder="0000000" aria-label="ci" aria-describedby="ci" id="person-id-input" name="ci">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Nombre</span>
                                    <input type="text" class="form-control" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" id="person-nombre-input" name="nombre">
                                </div>
                                <label class="form-label">Apellidos</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Paterno</span>
                                    <input type="text" class="form-control" placeholder="Paterno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="person-apePaterno-input" name="ApPaterno">
                                    <span class="input-group-text" id="basic-addon2">Materno</span>
                                    <input type="text" class="form-control" placeholder="Materno" aria-label="Recipient's username" aria-describedby="basic-addon2" id="person-apeMaterno-input" name="ApMaterno">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" >Foto Pesona</label>
                                    <input type="file" class="form-control" id="fotoP" name="fotoP">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            <!-- Fin editar datos -->
        </div>
    </div>
</div>



    <div class="table-responsive USUARIOS">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">CI</th>
                    <th scope="col">NOMBRE USUARIO</th>
                    <th scope="col">CARGO</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $usuarios as $usuario )
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->role }}</td>
                        <td>
                            <form action="{{route('admin.destroyPersona',$usuario)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" >Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){

        $('#editarPersona').click(function(){
            $('.datosP').hide();
            $('#formularioEditP').show();
        });


        //mandar datos
        $('#datosModal').on('show.bs.modal',function(event){
            var button = $(event.relateTarget);
            const personData = JSON.parse(this.getAttribute('data-person'));
            document.querySelectorAll('.show-user-details').forEach(button => {
                button.addEventListener('click', function(){
                    const personData = JSON.parse(this.getAttribute('data-person'));
                    document.getElementById('person-id-display').textContent = personData.id;
                    document.getElementById('person-nombre-display').textContent = personData.nombre;
                    document.getElementById('person-apePaterno-display').textContent = personData.apePaterno;
                    document.getElementById('person-apeMaterno-display').textContent = personData.apeMaterno;
                    document.getElementById('person-foto-display').src = personData.foto;

                    document.getElementById('person-id-input').value = personData.id;
                    document.getElementById('person-nombre-input').value = personData.nombre;
                    document.getElementById('person-apePaterno-input').value = personData.apePaterno;
                    document.getElementById('person-apeMaterno-input').value = personData.apeMaterno;
                });
            });
        });
    });
</script>
</x-layouts.appAdmin>


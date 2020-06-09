
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('contact-us') }}" method="post" id="form-contact-us" class="my-2 my-md-5 p-2 p-md-5 border">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6">
            <label class="m-1" for="nombre">Nombres:</label>
            <input type="text" class="form-control" name="name" id="nombre" placeholder="Nombres..." required>
        </div>
        <div class="col-12 col-md-6">
            <label class="m-1" for="apellido">Apellidos:</label>
            <input type="text" class="form-control" name="lastName" id="apellido" placeholder="Apellidos..." required>
        </div>
        <div class="col-12 col-md-6">
            <label class="m-1" for="edad">Edad:</label>
            <input type="number" class="form-control" name="age" id="edad" placeholder="Edad..." required>
        </div>
        <div class="col-12 col-md-6">
            <label class="m-1" for="telefono">Telefono:</label>
            <input type="number" class="form-control" name="phone" id="telefono" placeholder="Telefono..." required>
        </div>
        <div class="col-12 col-md-6">
            <label class="m-1" for="correo">Correo electronico:</label>
            <input type="email" class="form-control" name="email" id="correo" placeholder="Correo electronico..." required>
        </div>
        <div class="col-12 col-md-6">
            <label class="m-1" for="situacion">Situacion:</label>
            <select name="problem" id="situacion" class="form-control" required>
                <option disabled selected>--Seleccione una opcion--</option>
                <option value="Repostar un problema">Repostar un problema</option>
                <option value="Sugerir ideas nuevas">Sugerir ideas nuevas</option>
                <option value="Problemas para iniciar sesion">Problemas para iniciar sesion</option>
                <option value="Empresa interesada en los diseñadores">Empresa interesada en los diseñadores</option>
            </select>
        </div>
        <div class="col-12">
            <label class="m-1" for="mensaje">Mensaje:</label>
            <textarea name="message" id="mensaje" class="w-100" maxlength="250" minlength="5" required></textarea>
        </div>
        <div class="col-12">
            <input type="submit" name="Enviar" value="Enviar" class="btn btn-success w-100 mt-2">
        </div>
    </div>
</form>

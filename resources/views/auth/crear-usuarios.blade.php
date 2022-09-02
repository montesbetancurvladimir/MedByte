<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="d-flex barra justify-content-evenly align-items-center ">
            <div class="">
                <img src="../../img/logo-medbyte.png" alt="">
            </div>

            <div class="ancho-links">
                <nav class="flex gap-2">
                    <a href="" class="text-light">Home</a>
                    <a href="" class="text-light">Mensajes</a>
                    <a href="" class="text-light">Estadisticas</a>
                    <a href="" class="text-light">Pacientes</a>
                </nav>
            </div>

            <div class="d-flex align-items-center gap-2  ">
                <div class="dropdown border rounded-pill">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Es
                    </button>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#">Ingles</a></li>
                        <li><a class="dropdown-item" href="#">Portugues</a></li>
                    </ul>
                </div>
                <div>
                    <button class="border border-0 bg-transparent  "><i
                            class="bi bi-gear text-light configuracion fs-3"></i></button>
                </div>
                <div class="btn-group  rounded-pill " role="group" aria-label="Basic example">
                    <button type="button" class="btn primario">Iniciar sesión</button>
                    <button type="button" class="btn primario">Crea tu cuenta</button>
                </div>
                <span><i class="bi bi-person-circle fs-3 texto-primario"></i></span>
            </div>
        </div>
    </header>

    <main class="container">
        <h1>Configuracion de usuarios</h1>

        <div>
            <h3>Datos de usuarios</h3>
        </div>

        <div>
            <form method="POST" action="{{ route('User.store') }}" class="d-flex gap-5">
                @csrf
                <div class="row  ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block " for="">Nombre</label>
                            <input name="nombre1" type="text" class="input-usuarios">
                        </div>
                        <div class="input-usuarios">
                            <label class="d-block" class="d-block" for="">Segundo nombre</label>
                            <input name="nombre2" type="text">
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Apellido</label>
                            <input name="apellido1" type="text">
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Segundo Apellido</label>
                            <input name="apellido2" type="text">
                        </div>
                    </div>
                </div>

                <div class="row ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" for="">Documento</label>
                            <input name="documento" type="text">
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Celular</label>
                            <input name="celular" type="text">
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Email</label>
                            <input name="email" type="text">
                        </div>
                    </div>
                </div>

                <div class="row ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" for="">Contraseña</label>
                            <input type="text" type="password_confirmation">
                        </div class="input-usuarios">

                        <div class="input-usuarios">
                            <label class="d-block" for="">Confirmar contraseña</label>
                            <input type="password_confirmation" name="password">
                        </div>
                    </div>
                </div>

                <div class="row ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" for="">Seleccione el equipo a asignar:</label>
                            @foreach ($equipos as $description => $id)
                                <label class="form-check-label" for="ramos">{{$description}}</label><br>
                                <input id="ramos" name="ramo[]" type="radio" value="{{$id}}">
                            @endforeach
                        </div class="input-usuarios">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar y continuar</button>
            </form>
            
        </div>

    </main>

    <footer class="transparente centrar p-1 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>
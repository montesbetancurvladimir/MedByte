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
        <div>
            <h3 class="mt-4"><span class="texto-primario fw-bold">!Bienvenido a Medbyte¡</span> configuremos tu cuenta
            </h3>
            <h3 class="mt-3">configuración de usuarios</h3>
        </div>

        <div class="linea mt-5">
            <div>
                <canvas id="circulo" width="32" height="32"></canvas>

            </div>


            <hr width="200px" height="100px">
            <div>
                <canvas id="circulo-vacio" width="32" height="32"></canvas>
            </div>
            <hr width="200px" height="100px">
            <div>
                <canvas id="circulo-vacio" width="32" height="32"></canvas>
            </div>
            <hr width="200px" height="100px">
            <div>
                <canvas id="circulo-vacio" width="32" height="32"></canvas>
            </div>
        </div>

        <div class="mt-5">
            <div class="btn-group m-0" role="group" aria-label="Basic example">
                <button type="button" class="boton border fs-4" data-target="#usuarios">Usuarios</button>
                <button type="button" class="boton border fs-4" data-target="#equipos">Equipos</button>
            </div>
            <hr width="100%" class="m-0">
        </div>
        <!-- inicia pantalla usuarios -->

        <div class="content mb-5">
            <div data-content id="usuarios">
                <p class="mt-2">*Crea nuevos usuarios, personaliza permisos de usuario y elimina usuarios de tu cuenta.
                    <span class="texto-primario">Más informacion acerca de permisos de usuario.</span>
                </p>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">¡Bien hecho!</h4>
                    <p>{{ session('status') }}</p>
                    <hr>
                </div>
                <br>
                @endif

                <!-- Mensajes: resultado de las validaciones-->
                @if($errors->any())
                @foreach($errors->all() as $e)
                    <div  class="alert alert-warning error" role="alert">
                        {{ $e }}
                    </div>
                @endforeach
                @endif
                <!-- End: mensajes validaciones-->

                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div>
                        <div class="border px-3 py-1">
                            <input type="text" class="bg-transparent border-0">
                            <i class="bi bi-search"></i>
                        </div>

                    </div>
                    <div>
                        <input type="button" value="importar usuarios" class="primario bg-transparent p-1 text-light">
                        <a href="{{ route("User.create") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Crear usuarios">
                            Crear usuarios.
                        </a>
                    </div>
                </div>

                <div class="mt-5">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre 1</th>
                                <th>Nombre 2</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $p)
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>{{ $p->nombre1 }}</td>
                            <td>{{ $p->nombre2 }}</td>
                            <td>{{ $p->apellido1 }}</td>
                            <td>{{ $p->apellido2 }}</td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <a href="{{ route("User.edit",$p) }}" class="primario bg-transparent p-1 text-light fw-bold" title="Asignar equipo">
                                    Editar.
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-5 mt-5 fw-bold">
                    <div class="primario  p-2 centrar">
                        <p>Usuarios registrados: <span>2</span></p>
                    </div>
                    <div class="primario p-2  centrar">
                        <p>Te faltan por registrar: <span>3</span></p>
                    </div>
                </div>
            </div>

            <!-- inicia pantalla EQUIPOS -->
            <div data-content id="equipos">
                <h1>Configuracion de usuarios</h1>


                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div>
                        <div class="border px-3 py-1">
                            <input type="text" class="bg-transparent border-0">
                            <i class="bi bi-search"></i>
                        </div>

                    </div>
                    <div>
                        <input type="button" value="importar usuarios."  class="primario bg-transparent p-2 text-light">

                        <a href="{{ route("User.create_equipos") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Crear equipos">
                            Crear equipos.
                        </a>
                    </div>
                </div>

                <div class="mt-5">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>N. Usuarios</th>
                                <th>Unidad</th>
                                <th>Area</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>4</td>
                                <td>/</td>
                                <td>{{ $p->description }}</td>
                                <td><input type="button" value="Editar"
                                        class="primario bg-transparent p-1 text-light fw-bold"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>
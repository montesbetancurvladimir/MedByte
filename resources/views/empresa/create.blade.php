<!-- Token select triple-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar centro médico.') }}
        </h2>
    </x-slot>

    <x-auth-card class="p-4 w-full max-w-sm" >

    <div>
        <!-- Carga el primer registro de la tabla categoria -->
        <select name="" id="_pais">
            @foreach ($paises as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select>
        <!-- Se llenan dinamicamente mediante la Api Fetch DE js-->
        <select name="" id="_departamento"></select>
        <select name="" id="_municipio"></select>
    </div>

        <!-- Validation Errors -->

        <form method="POST" action="{{ route('Empresa.store') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Razón Social')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nombre1" :value="old('nombre1')" required autofocus />
            </div><br>

            <div>
                <x-label for="name" :value="__('Tipo Documento')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nombre2" :value="old('nombre2')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('Número Documento')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido1" :value="old('apellido1')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('País')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus />
            </div><br>
            <div>
                <x-label for="name" :value="__('Departamento')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus />
            </div><br>
            <div>
                <x-label for="name" :value="__('Municipio')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('Teléfono')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo Electrónico')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Dirección')" />
                <x-input id="password" class="block mt-1 w-full" type="text" name="password" required autocomplete="new-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <script>
            //Se necesita el token
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            //Detectar el cambio el select en categoria.
            document.getElementById('_pais').addEventListener('change',(e)=>{
                fetch('departamentos',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Elegir</option>";
                    for (let i in data.lista) {
                    opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
                    }
                    document.getElementById("_departamento").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })

            document.getElementById('_departamento').addEventListener('change',(e)=>{
                fetch('municipios',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Elegir</option>";
                    for (let i in data.lista) {
                    opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
                    }
                    document.getElementById("_municipio").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })

        </script>  

        <x-slot name="logo">
        </x-slot>
    </x-auth-card>
</x-app-layout>
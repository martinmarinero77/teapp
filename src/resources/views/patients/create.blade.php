<x-crud-layout>
	<x-slot name="title">Nuevo Pacientes</x-slot>

    <a href="{{ route('patients.index') }}"
    class="inline-flex items-center px-4 py-2 mb-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
         class="w-6 h-6 mr-2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        <span>Regresar</span>
    </a>

    <x-validation-errors class="mb-4" />

    <form action="{{ route('patients.store') }}" method="POST" class="mt-2">
        @csrf
        <div class="mt-2">
            <x-label for="codigo" value="Código" />
            <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo"
            :value="old('codigo')" required autofocus autocomplete="codigo"/>
            <x-validation-errors for="codigo" class="mb-4" />
        </div>
        <div class="mt-2">
            <x-label for="apellidos" value="Apellidos" />
            <x-input class="block mt-1 w-full" type="text" name="apellidos"
            :value="old('apellidos')" required autofocus autocomplete="apellidos"/>
        </div>

        <div class="mt-2">
            <x-label for="nombres" value="Nombres"/>
            <x-input class="block mt-1 w-full" type="text" name="nombres"
            :value="old('nombres')" required autofocus autocomplete="nombres"/>
        </div>

        <div class="mt-2">
            <x-label for="dni" value="DNI" />
            <x-input class="block mt-1 w-full" type="text" name="dni"
            :value="old('dni')" required autofocus autocomplete="dni"/>
        </div>

        <div class="mt-2">
            <x-label for="nacimiento" value="Fecha de nacimiento" />
            <x-input class="block mt-1 w-full" type="date" name="nacimiento"
            :value="old('nacimiento')" required autofocus autocomplete="nacimiento"/>
        </div>

        <div class="mt-2">
            <x-label for="sexo" value="Sexo" />
            <select name="sexo" required
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>

        <div class="mt-2">
            <x-label for="telefono" value="Teléfono" />
            <x-input class="block mt-1 w-full" type="text" name="telefono"
            :value="old('telefono')" required autofocus autocomplete="telefono"/>
        </div>

        <div class="mt-2">
            <x-label for="email" value="Email" />
            <x-input class="block mt-1 w-full" type="email" name="email"
            :value="old('email')" required autofocus autocomplete="email"/>
        </div>

        <div class="mt-2">
            <x-label for="direccion" value="Dirección"/>
            <x-input class="block mt-1 w-full" type="text" name="direccion"
            :value="old('direccion')" required autofocus autocomplete="direccion"/>
        </div>

        <div class="mt-2">
            <x-label for="observaciones" value="Observaciones"/>
            <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
             name="observaciones" required {{old('observaciones')}}></textarea>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ms-4">Crear Paciente</x-button>
        </div>
    </form>
</x-crud-layout>

<x-crud-layout>
    <x-slot name="title" class="text-2xl font-bold mb-4">Detalle del paciente</x-slot>

    @php
        $fields = [
            'Código' => $patient->codigo,
            'Apellidos' => $patient->apellidos,
            'Nombres' => $patient->nombres,
            'DNI' => $patient->dni,
            'Fecha de nacimiento' => $patient->nacimiento,
            'Sexo' => $patient->sexo,
            'Teléfono' => $patient->telefono,
            'Email' => $patient->email,
            'Dirección' => $patient->direccion,
            'Observaciones' => $patient->observaciones,
        ];
    @endphp

    @foreach($fields as $label => $value)
        <p class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 p-2">
            <span class="font-semibold">{{ $label }}:</span> {{ $value }}
        </p>
    @endforeach

    <a href="{{ route('patients.index') }}" class="inline-flex items-center px-4 py-2 mt-4 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition ease-in-out duration-150">
        Volver
    </a>
</x-crud-layout>


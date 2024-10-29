<x-event-layout>

    <x-slot name="title">Contador</x-slot>

    <div class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-4">Contador</h1>
            <div class="flex items-center space-x-4">
                <span class="text-2xl font-bold m-3">{{ $número }}</span> <!-- Mostrar el número -->

                <!-- Botón para incrementar -->
                <x-button class="bg-green-500 hover:bg-green-600 m-3"
                    onclick="location.href='{{ route('contador.inc', ['número' => $número]) }}'">
                    Incrementar
                </x-button>

                <!-- Botón para decrementar -->
                <x-button class="bg-red-500 hover:bg-red-600 m-3"
                    onclick="location.href='{{ route('contador.dec', ['número' => $número]) }}'">
                    Decrementar
                </x-button>

                <!-- Botón para reiniciar -->
                <x-button class="bg-red-500 hover:bg-red-600 m-3"
                    onclick="location.href='{{ route('contador.reinicio', ['número' => $número]) }}'">
                    Reiniciar
                </x-button>

                <!-- Botón para duplicar -->
                <x-button class="bg-red-500 hover:bg-red-600 m-3"
                    onclick="location.href='{{ route('contador.duplicar', ['número' => $número]) }}'">
                    Duplicar
                </x-button>

                <!--Boton para mostrar alerta -->
                <x-button class="bg-red-500 hover:bg-red-600 m-3"
                    onclick="location.href='{{ route('contador.alerta', ['número' => $número]) }}'">
                    Alerta
                </x-button>

                <!--Boton para establecer un valor -->
                <form action="{{ route('contador.establecer') }}" method="GET" class="flex items-center">
                    <input name="número" type="number" min="0" max="10" class="border border-gray-300 rounded p-2 m-3"
                        placeholder="Ingrese un valor (0-10)" required>
                    <x-button type="submit" class="bg-red-500 hover:bg-red-600 m-3">
                        Establecer
                    </x-button>
                </form>
            </div>
    </div>
    </div>

</x-event-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver ordenador: {{ $ordenador->marca }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-black">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg dark:text-gray-400">
                                marca
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $ordenador->marca }}
                            </dd>
                        </div> 
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg">
                                modelo
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $ordenador->modelo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-white md:text-lg">
                                aula
                            </dt>
                            <dd class="text-lg text-white font-semibold">
                                {{ $ordenador->aula->nombre }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @livewire('delete-cambio', [
                        'ordenadorId' => $ordenador->id
                    ])
                </div>
            </div>

            <div class="relative overflow-x-auto mt-10">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">dispositivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenador->dispositivos as $dispositivo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $dispositivo->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('ordenadores.index') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

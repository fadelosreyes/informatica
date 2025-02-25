<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Ordenadores
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 text-center">Marca</th>
                                    <th class="px-6 py-3 text-center">Modelo</th>
                                    <th class="px-6 py-3 text-center">Aula</th>
                                    <th class="px-6 py-3 text-center">N dispositivos</th>
                                    <th class="px-6 py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordenadores as $ordenador)
                                    <tr class="border-b dark:border-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                                            {{ $ordenador->marca }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $ordenador->modelo }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $ordenador->aula->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $ordenador->dispositivos->count() }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center space-x-4">
                                            <a href="{{ route('ordenadores.show', $ordenador) }}"
                                               class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                                Ver
                                            </a>
                                            <a href="{{ route('ordenadores.edit', $ordenador) }}"
                                               class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('ordenadores.destroy', $ordenador) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition"
                                                    onclick="return confirm('¿Está seguro de eliminar este ordenador?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="mt-4">
                {{ $ordenadores->links() }}
            </div>
            <div class="mt-6 flex justify-center">
                <a href="{{ route('ordenadores.create') }}"
                   class="px-6 py-3 text-lg font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                    Crear un nuevo ordenador
                </a>
            </div>

        </div>
    </div>

</x-app-layout>

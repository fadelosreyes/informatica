<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 text-center">id</th>
                                    <th class="px-6 py-3 text-center">nombre</th>
                                    <th class="px-6 py-3 text-center">acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aulas as $aula)
                                    <tr class="border-b dark:border-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white">
                                            {{ $aula->id }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $aula->nombre }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center space-x-4">
                                            <a href="{{ route('aula-show', ['aulaid' => $aula->id]) }}"
                                               class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-yellow-600 transition">
                                                ver
                                            </a>
                                            <a href="{{ route('aula-editar', ['aulaid' => $aula->id]) }}"
                                               class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                                Editar
                                            </a>
                                            @livewire('eliminar-aula', [
                                                'aulaid' => $aula->id
                                            ]);
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <a href="{{ route('aula-crear') }}"
                   class="px-6 py-3 text-lg font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                    Crear una nueva aula
                </a>
            </div>
        </div>
    </div>
</div>

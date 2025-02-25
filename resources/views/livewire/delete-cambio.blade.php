<div class="relative overflow-x-auto mt-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Fecha</th>
                <th scope="col" class="px-6 py-3">Origen</th>
                <th scope="col" class="px-6 py-3">Destino</th>
                <th scope="col" class="px-6 py-3">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ordenador->cambios as $cambio)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $cambio->created_at }}
                    </th>
                    <td class="px-6 py-4">{{ $cambio->origen->nombre }}</td>
                    <td class="px-6 py-4">{{ $cambio->destino->nombre }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="eliminar({{ $cambio->id }})"
                            class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

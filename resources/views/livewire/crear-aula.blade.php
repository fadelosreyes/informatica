<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="crear" class="max-w-sm mx-auto">
        <div class="mb-5">
            <x-input-label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                Nombre
            </x-input-label>
            <x-text-input wire:model="nombre" type="text" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <button type="submit"
            class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Crear
        </button>
    </form>
</div>

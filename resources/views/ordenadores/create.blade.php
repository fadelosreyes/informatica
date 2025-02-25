<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear ordenador
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('ordenadores.store') }}" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <x-input-label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                        marca
                    </x-input-label>
                    <x-text-input name="marca" type="text" id="marca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('marca')" />
                    <x-input-error :messages="$errors->get('marca')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                        modelo
                    </x-input-label>
                    <x-text-input name="modelo" type="text" id="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('modelo')" />
                    <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="aula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                        aula
                    </x-input-label>
                    <x-text-input name="aula" type="text" id="aula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('aula')" />
                    <x-input-error :messages="$errors->get('aula')" class="mt-2" />
                </div>
                <button type="submit" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

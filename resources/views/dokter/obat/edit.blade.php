<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Obat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <section class=" mx-auto">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Data Obat') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Silakan perbarui informasi obat sesuai dengan nama, kemasan, dan harga terbaru.') }}
                            </p>
                        </header>

                        <form class="mt-6 space-y-6" action="{{ route('dokter.obat.update', $obat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="editNamaObatInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama Obat
                                </label>
                                <input 
                                    type="text" 
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_obat') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                                    id="editNamaObatInput" 
                                    name="nama_obat" 
                                    value="{{ old('nama_obat', $obat->nama_obat) }}"
                                    required
                                >
                                @error('nama_obat')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="editKemasanInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Kemasan
                                </label>
                                <input 
                                    type="text" 
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('kemasan') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                                    id="editKemasanInput" 
                                    name="kemasan" 
                                    value="{{ old('kemasan', $obat->kemasan) }}"
                                    required
                                >
                                @error('kemasan')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="editHargaInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Harga
                                </label>
                                <input 
                                    type="number" 
                                    step="0.01" 
                                    class="block w-full mt-1 border-gray-300NRAS

System: * The response was truncated due to the character limit. Here's the continuation:

gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('harga') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" 
                                    id="editHargaInput" 
                                    name="harga" 
                                    value="{{ old('harga', $obat->harga) }}"
                                    required
                                >
                                @error('harga')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end gap-4">
                                <a 
                                    href="{{ route('dokter.obat.index') }}" 
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Batal
                                </a>
                                <button 
                                    type="submit" 
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Update
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
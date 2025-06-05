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
                    <section class="max-w-xl mx-auto">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Data Obat') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Silakan isi form di bawah ini untuk menambahkan data obat ke dalam sistem.') }}
                            </p>
                        </header>

                        <form class="mt-6 space-y-6" id="formObat" action="{{ route('dokter.obat.store') }}" method="POST">
                            @csrf

                            <div>
                                <label for="namaObat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama Obat
                                </label>
                                <input 
                                    type="text" 
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    id="namaObat" 
                                    name="nama_obat"
                                    required
                                >
                                @error('nama_obat')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kemasan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Kemasan
                                </label>
                                <input 
                                    type="text" 
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    id="kemasan" 
                                    name="kemasan"
                                    required
                                >
                                @error('kemasan')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Harga
                                </label>
                                <input 
                                    type="number" 
                                    step="0.01"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    id="harga" 
                                    name="harga"
                                    required
                                >
                                @error('harga')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end gap-4">
                                <a 
                                    href="{{ route('dokter.obat.index') }}" 
                                    class=" px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Batal
                                </a>
                                <button 
                                    type="submit" 
                                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
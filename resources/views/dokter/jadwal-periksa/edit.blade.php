
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <section class="max-w-xl mx-auto">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Jadwal Periksa') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Silakan perbarui jadwal periksa sesuai kebutuhan.') }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('dokter.jadwal-periksa.update', $jadwalPeriksa->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hari</label>
                                <select id="hari" name="hari" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('hari') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin" {{ old('hari', $jadwalPeriksa->hari) === 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ old('hari', $jadwalPeriksa->hari) === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ old('hari', $jadwalPeriksa->hari) === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ old('hari', $jadwalPeriksa->hari) === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ old('hari', $jadwalPeriksa->hari) === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ old('hari', $jadwalPeriksa->hari) === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ old('hari', $jadwalPeriksa->hari) === 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                            </div>

                            <div>
                                <label for="jam_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jam Mulai</label>
                                <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jam_mulai') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                                <x-input-error class="mt-2" :messages="$errors->get('jam_mulai')" />
                            </div>

                            <div>
                                <label for="jam_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jam Selesai</label>
                                <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jam_selesai') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                                <x-input-error class="mt-2" :messages="$errors->get('jam_selesai')" />
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('status') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                                    <option value="1" {{ old('status', $jadwalPeriksa->status) ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !old('status', $jadwalPeriksa->status) ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>

                            <div class="flex items-center justify-end gap-4">
                                <a href="{{ route('dokter.jadwal-periksa.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Batal
                                </a>
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

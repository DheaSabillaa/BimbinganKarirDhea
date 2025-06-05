<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <header class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Daftar Jadwal Periksa') }}
                    </h2>

                    <div class="flex flex-col items-end space-y-2">
                        <a href="{{ route('dokter.jadwal-periksa.create') }}"
                           class="inline-block px-4 py-2  bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">
                            Tambah Jadwal
                        </a>

                        @if (session('status') === 'jadwal-created')
                            <p x-data="{ show: true }" x-show="show" x-transition
                               x-init="setTimeout(() => show = false, 2000)"
                               class="text-sm text-gray-600">
                                {{ __('Jadwal berhasil dibuat.') }}
                            </p>
                        @endif
                    </div>
                </header>

                @if (session('success'))
                    <script>
                        alert("{{ session('success') }}");
                    </script>
                @endif

                <div class="overflow-x-auto">
                    <table class=" text-sm border border-gray-200 divide-y divide-gray-200" style="width: 100%;">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Hari</th>
                                <th class="px-4 py-2 text-left">Jam Mulai</th>
                                <th class="px-4 py-2 text-left">Jam Selesai</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td class="px-4 py-2 items-center ">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 items-center ">{{ $jadwal->hari }}</td>
                                    <td class="px-4 py-2 items-center ">{{ $jadwal->jam_mulai }}</td>
                                    <td class="px-4 py-2 items-center ">{{ $jadwal->jam_selesai }}</td>
                                    <td class="px-4 py-2">
                                        <span class="inline-block px-3 py-1 text-sm font-semibold  rounded-full
                                            {{ $jadwal->status == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                                            {{ $jadwal->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        <!-- Toggle status -->
                                        <form action="{{ route('dokter.jadwal-periksa.status', $jadwal->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="px-3 py-1 text-white rounded text-sm
                                                    {{ $jadwal->status == 1 ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }}">
                                                {{ $jadwal->status == 1 ? 'Nonaktifkan' : 'Aktifkan' }}
                                            </button>
                                        </form>

                                        <!-- Hapus jadwal -->
                                        <form action="{{ route('dokter.jadwal-periksa.destroy', $jadwal->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 text-white bg-red-600 rounded text-sm hover:bg-red-700">
                                                Hapus
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
    </div>
</x-app-layout>

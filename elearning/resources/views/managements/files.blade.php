<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .color {
        background-color: #FFFF;
    }

    .tengah {
        justify-content: center;
        align-items: center;
        margin: 0 auto;

    }

    table {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;

    }


    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        text-align: center;
    }

    .edit-button {
        background-color: #19A7CE;
        color: #fff;
        border: none;
        padding: 6px 12px;
        cursor: pointer;
    }

    .delete-button {
        background-color: red;
        color: #fff;
        border: none;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>


<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex justify-between">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                    {{ __('E-Learning | Management File Tersimpan') }}
                </h2>
            </div>
                @if (Session::has('msg')) 
                    <div class="w-fit bg-cyan-500 text-white px-5 py-2 rounded mb-2">
                        {{ Session::get('msg') }}
                    </div>
                @endif
        </div>
    </x-slot>

    <div style="background-color: #FFFF" class="min-h-screen overflow-x-hidden">

        <!--Tabel-->
        <div class="overflow-x-auto">
        <table class="tengah">
            <tr>
                <th>id</th>
                <th>Nama File</th>
                <th>Terakhir Diubah</th>
                <th>Aksi</th>
            </tr>
            @forelse ($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->filename }}</td>
                    <td>{{ $file->updated_at }}</td>
                    <td>
                        <div class="flex justify-center gap-2">
                            <!-- Tombol aksi -->
                            <form action="{{ Route('files.destroy', $file->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data tidak ditemukan... Tabel dalam keadaan kosong.</td>
                </tr>
            @endforelse
            <!-- Tambahkan baris untuk kelas lainnya -->
        </table>
        </div>
    </div>
</x-app-layout>

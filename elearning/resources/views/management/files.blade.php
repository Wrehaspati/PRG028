<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning </title>
</head>

<body>
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
        <div class="color"></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | File Tersimpan | Halo Admin !') }}
            </h2>
        </x-slot>

        <div style="background-color: #FFFF">

            <!--Tabel-->
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
                                <button class="edit-button">Edit</button>
                                <form action="{{ Route('file.destroy', $file->id) }}" method="POST">
                                    @csrf   
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
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

            <hr style="margin-top: 200px">

            <!--Media Sosial-->
            <section style="padding-bottom: 50px; padding-top : 30px; padding-left : 110px;">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <span class="me-4">Connect with us:</span>
                        <a href="https://www.instagram.com/akun_instagram" target="_blank">
                            <i class="fab fa-instagram fa-2x" style="color: #ac2bac; margin-right: 20px;"></i>
                        </a>
                        <a href="https://www.facebook.com/akun_facebook" target="_blank">
                            <i class="fab fa-facebook-f fa-2x" style="color: #3b5998; margin-right: 20px;"></i>
                        </a>
                        <a href="https://www.youtube.com/akun_youtube" target="_blank">
                            <i class="fab fa-youtube fa-2x" style="color: #ed302f; margin-right: 20px;"></i>
                        </a>
                        <a href="https://www.twitter.com/akun_twitter" target="_blank">
                            <i class="fab fa-twitter fa-2x" style="color: #55acee; margin-right: 20px;"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--Footer-->
            <footer style="background-color: #F2F2F2; padding: 40px;">
                <div style="text-align: center;">
                    <span>@elearning2023</span>
                    <br>
                    <span>You are logged in.</span>
                </div>
            </footer>
        </div>
        </div>
    </x-app-layout>

</body>

</html>

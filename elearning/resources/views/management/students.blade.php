<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning</title>
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

        .kanan {
            text-align: right;
            padding-right: 170px;
        }

        .button {
            background-color: #19A7CE;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0D7E9B;
        }

        .button-delete {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content textarea {
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.2);
            border: 0;
        }

        .form-container {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 10px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="color"></div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | Management Siswa | Halo Admin!') }}
            </h2>
        </x-slot>

        <div style="background-color: #FFFF">
            @if (Auth::user()->role)
                <div class="kanan">
                    <button class="button" onclick="openModal()">Create</button>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="form-container">
                            <br>
                            <div class="form-group" style="padding-left: 88px">
                                <label for="id1">Id
                                    <input type="text" id="id1" name="id1" placeholder="Enter ID">
                                </label>
                            </div>

                            <div class="form-group" style="padding-left: 60px">
                                <label for="id2">Nama
                                    <input type="text" id="id2" name="id2" placeholder="Enter Nama">
                                </label>
                            </div>

                            <div class="form-group" style="padding-left: 68px">
                                <label for="id3">Kelas
                                    <input type="text" id="id3" name="id3" placeholder="Enter Kelas">
                                </label>
                            </div>

                            <div class="form-group" style="padding-left: 56px">
                                <label for="id4">ID User
                                    <input type="text" id="id4" name="id4" placeholder="Enter ID User">
                                </label>
                            </div>
                        </div>
                        <div class="kanan">
                            <button class="button" onclick="saveTask()">OK</button>
                            <button class="button-delete" onclick="deleteTulisan()">Delete</button>
                        </div>
                    </div>
                </div>
            @endif
            <br>

            <table class="tengah">
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Id User</th>
                    <th>Terakhir Diubah</th>
                    <th>Aksi</th>
                </tr>

                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->grade_name }}</td>
                        <td>{{ $student->user_id }}</td>
                        <td>{{ $student->updated_at }}</td>
                        <td>
                            <div class="flex justify-center gap-2">
                                <button class="edit-button">Edit</button>
                                <form action="{{ Route('students.destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Data tidak ditemukan... Tabel dalam keadaan kosong.</td>
                    </tr>
                @endforelse
            </table>

            <hr style="margin-top: 200px">

            <!--Media Sosial-->
            <section style="padding-bottom: 50px; padding-top: 30px; padding-left: 110px;">
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
        </div>

        <!--Footer-->
        <footer style="background-color: #F2F2F2; padding: 40px;">
            <div style="text-align: center;">
                <span>@elearning2023</span>
                <br>
                <span>You are logged in.</span>
            </div>
        </footer>
    </x-app-layout>

    <script>
        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function deleteTulisan() {
            var id1Input = document.getElementById("id1");
            var id2Input = document.getElementById("id2");
            var id3Input = document.getElementById("id3");
            var id4Input = document.getElementById("id4");

            id1Input.value = "";
            id2Input.value = "";
            id3Input.value = "";
            id4Input.value = "";

        }

        function saveTask() {
            var id1 = document.getElementById("id1").value;
            var id2 = document.getElementById("id2").value;
            var id3 = document.getElementById("id3").value;
            var id4 = document.getElementById("id4").value;

            var table = document.getElementsByTagName("table")[0];
            var newRow = table.insertRow(table.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);

            cell1.innerHTML = id1;
            cell2.innerHTML = id2;
            cell3.innerHTML = id3;
            cell4.innerHTML = id4;
            cell5.innerHTML = "Waktu saat ini";
            cell6.innerHTML = `
                <button class="edit-button">Edit</button>
                <button class="delete-button" onclick="deleteRow(this)">Hapus</button>
            `;

            closeModal();
            deleteTulisan();
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>

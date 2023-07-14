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
            background-color: #FFFF
        }

        /* .container {
            text-align: center;

        } */

        .upload-button,
        .remove-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #00CFDD;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 10px;

        }

        .upload-button:hover,
        .remove-button:hover {
            background-color: #00A6B5;
        }

        .teks {
            padding-top: 50px;
            padding-left: 100px;
        }

        /* .card {
            display: none;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 4px;
            margin-top: 20px;
        } */

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
    </style>


    <x-app-layout>
        <div class="color"></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | ' . $subject->subject_name) }}
            </h2>
        </x-slot>

        <div style="background-color: #FFFF">
            {{--  tombol di dashboard file matematika --}}
            @if (Auth::user()->role)
                <div class="kanan">
                    <button class="button" onclick="openModal()">Create</button>
                    {{-- <button class="button" onclick="openModal()">Edit</button> --}}
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <form action="{{ route('assignments.store') }}" method="POST">
                            @csrf
                            <h2>Title / Judul</h2>
                            <input type="hidden" name="subject" value="{{ $subject->id }}">
                            <input type="text" required name="title" class="w-2/3 mb-10">
                            <h2>Description Task</h2>
                            <textarea id="taskDescription" class="w-2/3 mb-10" name="description" required rows="4" cols="50"
                                placeholder="Enter task description here..."></textarea>
                            {{-- <br><br><br> --}}
                            {{-- <input type="file" id="fileInput" name="file_upload"> --}}
                            <div class="kanan">
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="reset">Delete</button>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">OK</button>
                        </form>
                    </div>
                </div>
        </div>

        {{-- buat naruh hasil/tulisan dari tombol create --}}
        <div id="card" style="display: none;"> </div>
        @endif

        <!--Card kelas-->
        <section class="container" style="padding-left: 80px;">
            <div style="display: flex; padding-left: 100px; padding-top: 50px; padding-right : 100px"">
                <div style="flex: 1;">
                    @if ($assignments != null && count($assignments) > 0)
                        @foreach ($assignments as $assignment)
                            <x-assignment-card :$assignment :$subject />
                        @endforeach
                    @else
                        <p style="text-decoration: padding-top: 20px">
                            Belum ada file tugas atau materi diberikan dari guru...
                        </p>
                    @endif

                    {{-- <p style="text-decoration: underline; padding-top: 20px">
                            <a href="{{ Route('dashboard.filematematika') }}"> Silahkan buatlah tugas berikut kerjakan
                                format pdf.</a>

                        </p> --}}
                </div>


            </div>


        </section>

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
        <script>
            // Memilih elemen tombol dan input file
            const uploadButton = document.querySelector('.upload-button');
            const removeButton = document.querySelector('.remove-button');
            const fileInput = document.getElementById('file-input');
            const fileName = document.getElementById('file-name');
            const uploadSuccess = document.getElementById('upload-success');

            // Mengatur event listener untuk tombol Upload
            uploadButton.addEventListener('click', function() {
                fileInput.click();
            });

            // Mengatur event listener untuk perubahan input file
            fileInput.addEventListener('change', function() {
                const selectedFile = fileInput.files[0];

                if (selectedFile) {
                    // Proses upload file di sini
                    console.log('File yang dipilih:', selectedFile);

                    // Menampilkan nama file pada kotak bayangan
                    fileName.textContent = `File Upload | ${selectedFile.name}`;

                    // Mengaktifkan tombol Remove setelah berhasil upload
                    removeButton.disabled = false;

                    // Menampilkan notifikasi file berhasil diunggah
                    uploadSuccess.textContent = 'File berhasil diunggah.';
                    uploadSuccess.style.display = 'block';
                }
            });

            // Mengatur event listener untuk tombol Remove
            removeButton.addEventListener('click', function() {
                // Proses penghapusan file di sini
                console.log('File dihapus.');

                // Mengosongkan nilai input file
                fileInput.value = '';

                // Menonaktifkan tombol Remove
                removeButton.disabled = true;

                // Mengembalikan teks pada kotak bayangan ke keadaan semula
                fileName.textContent = 'File Upload |';

                // Menghilangkan notifikasi file berhasil diunggah
                uploadSuccess.style.display = 'none';
            });


            // js tombol create
            function openModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "block";
            }

            function closeModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
            }

            function deleteTask() {
                var taskDescription = document.getElementById("taskDescription, fileInput");
                taskDescription.value = "";

                var fileInput = document.getElementById("fileInput");
                fileInput.value = ""; // Reset nilai input file
            }

            function saveTask() {
                var taskDescription = document.getElementById("taskDescription");
                var description = taskDescription.value;
                console.log("Deskripsi Tugas: ", description);
                closeModal();
                showCard(description);
            }

            function showCard(description) {
                var card = document.getElementById("card");
                card.innerHTML = description;
                card.style.display = "block";
            }

            window.onclick = function(event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            function openModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "block";
            }

            function closeModal() {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
            }

            function deleteTask() {
                var taskDescription = document.getElementById("taskDescription");
                taskDescription.value = "";
                var fileInput = document.getElementById("fileInput");
                fileInput.value = "";
            }

            function saveTask() {
                var taskDescription = document.getElementById("taskDescription");
                var description = taskDescription.value;
                console.log("Deskripsi Tugas: ", description);
                closeModal();
                showCard(description);
            }

            function showCard(description) {
                var card = document.getElementById("card");
                card.innerHTML = description;
                card.style.display = "block";
            }

            window.onclick = function(event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </x-app-layout>

</body>

</html>

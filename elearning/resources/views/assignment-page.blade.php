<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <style>
        .color {
            background-color: #FFFF
        }

        .container {
            text-align: center;
        }

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

        .card {
            display: none;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 4px;
            margin-top: 20px;
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

        .grade-button {
            background-color: #19A7CE;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .grade-button:focus {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }
    </style>

    <x-app-layout>
        <div class="color"></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | ' . $subject->subject_name . ' | ' . $assignment->assignment_title) }} </h2>
        </x-slot>
        <div style="background-color: #FFFF">
            @if (Auth::user()->role)
                <div class="flex justify-end gap-2 pr-20">
                    <form action="{{ Route('assignments.destroy', $assignment->id) }}" method="POST">
                        @csrf   
                        @method('DELETE')        
                        <button class="button bg-red-500 hover:bg-red-700" onclick="">Delete</button>
                    </form>
                    <button class="button" onclick="openModal()">Edit</button>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>

                        <h2>Description Task</h2>
                        <textarea id="taskDescription" name="task_description" rows="4" cols="50"
                            placeholder="Enter task description here..."></textarea>
                        <br><br><br>
                        <input type="file" id="fileInput" name="file_upload">
                        <div class="kanan">
                            <button class="button-delete" onclick="deleteTask()">Delete</button>
                            <button class="button" onclick="saveTask()">OK</button>
                        </div>
                    </div>
                </div>
                <div id="card" style="display: none;"></div>
            @endif

            <section style="padding-left: 80px;">
                <div class="teks">
                    <p>{{ $assignment->description }} </p>
                </div>
                <div class="teks">
                    <p> // pada tempat ini harusnya berisi file soal, ketika guru mengupload
                        soal dalam bentuk pdf/file
                    </p>
                </div>
                <div style="display: flex; padding-left: 50px; padding-top: 10px; padding-right : 100px">
                    <div style="flex: 1;">
                        <div class="card-body">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <p style="padding: 20px; border-radius: 8px;">Tugas | Menghitung Volume Kubus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    style="display: flex; padding-left: 50px; padding-top: 20px; padding-bottom:50px; padding-right : 100px">
                    <div style="flex: 1;">
                        <div class="card-body">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <p id="file-name" style="padding: 20px; border-radius: 8px;">File Upload |</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <input type="file" id="file-input" style="display: none;">
                <button class="upload-button">Upload</button>
                <button class="remove-button" disabled>Remove</button>
            </div>
            <div id="upload-success"
                style="display: none; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 8px; margin-top: 10px;">
            </div>
            <br>
            <hr>
            <br><br>

            <table class="tengah">
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Filename (click to view)</th>
                    <th>Grades</th>
                    <th>Action Grade</th>
                </tr>

                @forelse ($files as $file) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $file->id }}</td>
                        <td>{{ $file->student_name }}</td>
                        <td>{{ $file->filename }}</td>
                        <td id="grade-1">
                            @if ($file->grade && $file->grade != '') 
                                {{ $file->grade }}
                            @else 
                                {{ __('Belum dinilai') }}
                            @endif
                        </td>
                        <td>
                            <button class="grade-button" onclick="showGradeModal()">Grades</button>
                        </td>
                    </tr>
                @empty 
                
                @endforelse
                
            </table>
            <div id="grade-modal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeGradeModal()">&times;</span>
                    <h2>Grades</h2>
                    <input type="number" id="grade-input" class="grade-input" placeholder="Enter grade" />
                    <button class="button" onclick="saveGrade()">OK</button>

                </div>
            </div>

            <hr style="margin-top: 200px">
            <section style="padding-bottom: 50px; padding-top : 30px; padding-left : 110px;">
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
            </section>
            <footer style="background-color: #F2F2F2; padding: 40px;">
                <div style="text-align: center;">
                    <span>@elearning2023</span> <br>
                    <span>You are logged in.</span>
                </div>
            </footer>
        </div>
    </x-app-layout>

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

        // grade
        function showGradeModal() {
            var gradeModal = document.getElementById("grade-modal");
            gradeModal.style.display = "block";
        }

        function closeGradeModal() {
            var gradeModal = document.getElementById("grade-modal");
            gradeModal.style.display = "none";
        }

        function saveGrade() {
            var gradeInput = document.getElementById("grade-input");
            var grade = gradeInput.value;
            console.log("Grade:", grade);
            closeGradeModal();
        }

        //input nilai
        var selectedGradeId;

        function showGradeModal(gradeId) {
            selectedGradeId = gradeId;
            var gradeModal = document.getElementById("grade-modal");
            gradeModal.style.display = "block";
        }

        function closeGradeModal() {
            var gradeModal = document.getElementById("grade-modal");
            gradeModal.style.display = "none";
        }

        function saveGrade() {
            var gradeInput = document.getElementById("grade-input");
            var grade = gradeInput.value;
            console.log("Grade:", grade);

            var gradeCell = document.getElementById("grade-" + selectedGradeId);
            gradeCell.textContent = grade;

            closeGradeModal();
        }
        //--
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            var gradeModal = document.getElementById("grade-modal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == gradeModal) {
                gradeModal.style.display = "none";
            }
        }
    </script>
</body>

</html>

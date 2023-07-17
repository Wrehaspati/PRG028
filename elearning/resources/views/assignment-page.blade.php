<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            border-radius: 5px;
        }

        .upload-button:hover,
        .remove-button:hover {
            background-color: #00A6B5;
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

        .modal-content textarea,
        .judul {
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
            <div class="w-full flex justify-center">
                <div class="flex justify-between w-4/5 pt-5">
                    <section class="">
                        <div class="text-lg">
                            <p>{{ $assignment->description }} </p>
                        </div>
                        <div class="text-lg">
                            @forelse ($teacher_files as $file)
                                @if ($file->assign_by == 'teacher') 
                                    <div class="py-2 mt-5 px-10 w-fit bg-gray-100 rounded-lg text-md">
                                        <a class="text-blue-700 hover:text-blue-900 underline" href="{{ asset($file->path.$file->filename) }}">{{ $file->filename }}</a>
                                    </div>
                                @endif
                            @empty
                                <p class="text-green-600">
                                    // pada tempat ini harusnya berisi file soal, ketika guru mengupload
                                    soal dalam bentuk pdf/file
                                </p>
                            @endforelse
                        </div>
                        <br>
                        <p class="text-sm">Max upload size : 2 MB</p>
                        <p class="text-sm text-red-500">* Harap hubungi guru yang mengajar atau BK jika file tidak dapat diunduh / bermasalah.</p>
                    </section>
                    <div class="flex justify-end gap-2 h-fit">
                    @if (Auth::user()->role)
                        @if (count($files) == 0) 
                            <form action="{{ Route('assignments.destroy', $assignment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button bg-red-500 hover:bg-red-700" onclick="">Delete</button>
                            </form>
                        @else
                            <button class="button bg-green-500 hover:bg-green-700" onclick="">Mark as Completed</button>
                        @endif
    
                        @if (count($teacher_files) == 0) 
                            <a class="button m-0" onclick="openModal()">Upload Files</a>
                        @else 
                            <a class="button m-0" href="/edit-assignment">Edit Assignment</a>
                        @endif
                    @endif
                    </div>
                </div>
            </div>           


            @if (!Auth::user()->role)
                <div class="container pt-10">
                    <input type="file" id="file-input" style="display: none;">
                    <button class="upload-button" onclick="openModal()">Upload</button>
                </div>
                <div id="upload-success"
                    style="display: none; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 8px; margin-top: 10px;">
                </div>

                <div id="myModal" class="modal">
                    <form action="">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <input type="file" id="fileInput" name="file_upload">
                            <div class="kanan">
                                <button class="button bg-red-500 hover:bg-red-700" type="reset">Hapus</button>
                                <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="card" style="display: none;"></div>
            @else
                <div id="myModal" class="modal">
                    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h2>Materials/Files</h2>
                            
                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                            <input type="hidden" name="assign_by" value="teacher">
  
                            <div class="input-group hdtuto control-group lst increment" >
                                <input type="file" name="filenames[]" class="myfrm form-control">
                                <div class="input-group-btn"> 
                                    <button class="btn-success button bg-green-500 my-2 px-4 py-2" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add More Files</button>
                                </div>
                            </div>
                            <div class="clone hidden">
                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn"> 
                                        <button class="button bg-red-500 hover:bg-red-800 my-2 px-4 py-2 btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>

                            {{-- <input type="file" id="fileInput" name="file_upload"> --}}
                            <div class="kanan">
                                <button class="button-delete" onclick="deleteTask()">Delete</button>
                                <button class="button" onclick="saveTask()">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="card" style="display: none;"></div>
            @endif


            @if (Auth::user()->role)
                <br>
                <hr> <br><br>
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
                                @if ($file->grade && $file->grade != '')
                                    <button class="grade-button rounded" onclick="showGradeModal({{ $file->id }}, {{ $file->grade }})">Edit nilai</button>
                                @else
                                    <button class="grade-button rounded" onclick="showGradeModal({{ $file->id }})">Beri nilai</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada file yang terkirim</td>
                        </tr>
                    @endforelse
            @endif


            </table>
            <div id="grade-modal" class="modal">
                <div class="modal-content">
                    <form action="{{ route('file.grade') }}" method="POST">
                        @csrf
                        <span class="close" onclick="closeGradeModal()">&times;</span>
                        <h2>Grades</h2>
                        <input type="number" max="100" min="0" class="w-1/5" id="grade-input" name="grade" class="grade-input" placeholder="Enter grade" />
                        <input type="hidden" id="form-hidden-id" name="file_id">
                        <button class="button" onclick="saveGrade()">OK</button>
                    </form>
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
        // Script untuk Multiple input file
        $(document).ready(function() {
            $(".btn-success").click(function(){ 
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".hdtuto").remove();
            });
        });


        // Memilih elemen tombol dan input file
        const uploadButton = document.querySelector('.upload-button');
        const removeButton = document.querySelector('.remove-button');
        const fileInput = document.getElementById('file-input');
        const fileName = document.getElementById('file-name');
        const uploadSuccess = document.getElementById('upload-success');

        // Mengatur event untuk tombol Upload
        // uploadButton.addEventListener('click', function() {
        //     fileInput.click();
        // });

        // Mengatur event listener untuk perubahan input file
        // fileInput.addEventListener('change', function() {
        //     const selectedFile = fileInput.files[0];

        //     if (selectedFile) {
        //         // Proses upload file di sini
        //         console.log('File yang dipilih:', selectedFile);

        //         // Menampilkan nama file pada kotak bayangan
        //         fileName.textContent = `File Upload | ${selectedFile.name}`;

        //         // Mengaktifkan tombol Remove setelah berhasil upload
        //         removeButton.disabled = false;

        //         // Menampilkan notifikasi file berhasil diunggah
        //         uploadSuccess.textContent = 'File berhasil diunggah.';
        //         uploadSuccess.style.display = 'block';
        //     }
        // });

        // // Mengatur event listener untuk tombol Remove
        // removeButton.addEventListener('click', function() {
        //     // Proses penghapusan file di sini
        //     console.log('File dihapus.');

        //     // Mengosongkan nilai input file
        //     fileInput.value = '';

        //     // Menonaktifkan tombol Remove
        //     removeButton.disabled = true;

        //     // Mengembalikan teks pada kotak bayangan ke keadaan semula
        //     fileName.textContent = 'File Upload |';

        //     // Menghilangkan notifikasi file berhasil diunggah
        //     uploadSuccess.style.display = 'none';
        // });

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
        var selectedGradeId, hasGrade;

        function showGradeModal(gradeId, hasGrade) {
            selectedGradeId = gradeId;
            var gradeModal = document.getElementById("grade-modal");
            var hasGradeInput = document.getElementById("grade-input");
            var hiddeninput = document.getElementById("form-hidden-id");
            hasGradeInput.value = hasGrade
            hiddeninput.value = selectedGradeId;
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

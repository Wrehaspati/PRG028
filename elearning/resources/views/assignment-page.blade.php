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

        /* Drop and Drag CSS */

        .file-drop-area {
        position: relative;
        display: flex;
        align-items: center;
        width: 450px;
        max-width: 100%;
        padding: 25px;
        border: 1px dashed rgba(255, 255, 255, 0.4);
        border-radius: 3px;
        transition: 0.2s;
        &.is-active {
            background-color: rgba(255, 255, 255, 0.05);
        }
        }

        .fake-btn {
        flex-shrink: 0;
        background-color: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 3px;
        padding: 8px 15px;
        margin-right: 10px;
        font-size: 12px;
        text-transform: uppercase;
        }

        .file-msg {
        font-size: small;
        font-weight: 300;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        .file-input {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;
        &:focus {
            outline: none;
        }
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
                                        <a class="text-blue-700 hover:text-blue-900 underline" target="_blank" href="{{ asset($file->path.$file->filename) }}">{{ $file->filename }}</a>
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
                        <div class="text-sm">lampiran dibuat pada {{ $assignment->created_at }}</div>
                        
                        @if (isset($files))  
                            @foreach ($files as $file) 
                                @if ($file->user_id == Auth::user()->id) 
                                    <div class="px-10 py-4 mt-4 bg-cyan-100 rounded w-fit">
                                        File yang diajukan : {{ $file->filename }} (<a href="{{ asset($file->path.$file->filename) }}" target="_blank" class="text-blue-500 underline">click to view</a>)
                                        @if ($assignment->status != 'closed') 
                                            <form action="{{ Route('files.destroy', $file->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="mt-2 button bg-red-500 hover:bg-red-700" onclick="">Batalkan Pengajuan</button>
                                            </form>
                                        @endif
                                    </div>
                                    @php
                                        $isNotNull = true;
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                    </section>
                    <div class="flex flex-col">
                        <div class="flex">
                            @if ($assignment->status != '' && $assignment->status == 'closed') 
                                <svg class="inline-block" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="20px" height="20px">
                                    <path d="M 26.980469 5.9902344 A 1.0001 1.0001 0 0 0 26.292969 6.2929688 L 11 21.585938 L 4.7070312 15.292969 A 1.0001 1.0001 0 1 0 3.2929688 16.707031 L 10.292969 23.707031 A 1.0001 1.0001 0 0 0 11.707031 23.707031 L 27.707031 7.7070312 A 1.0001 1.0001 0 0 0 26.980469 5.9902344 z"/>
                                </svg>
                                <p class="pl-2">
                                    Pengajuan dikunci pada {{ $assignment->updated_at }}
                                </p>
                            @endif
                        </div>
                        <div class="flex justify-end gap-2 h-fit">
                            @if (Auth::user()->role)
                                @if (count($files) == 0) 
                                    <form action="{{ Route('assignments.destroy', $assignment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button bg-red-500 hover:bg-red-700" onclick="">Delete</button>
                                    </form>
                                @endif
                                    <form action="{{ Route('assignment.close', $assignment->id) }}" method="POST">
                                        @csrf
                                            @if ($assignment->status != '' && $assignment->status == 'closed') 
                                                <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">
                                                    Buka Kunci Pengajuan
                                                </button>
                                            @else 
                                                <button class="button bg-green-500 hover:bg-green-700" type="submit">
                                                    Kunci Pengajuan
                                                </button>
                                            @endif
                                    </form>
                                
                                @if (count($teacher_files) == 0) 
                                    <a class="button m-0" onclick="openModal()">Upload Files</a>
                                @else 
                                    <a class="button m-0" href="/edit-assignment">Edit Assignment</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>           


            @if (!Auth::user()->role)
                @if ($assignment->status != 'closed') 
                    @if (isset($isNotNull) && $assignment->status != 'closed')
                        <div class="pt-5 flex w-full justify-center">
                            <button class="upload-button" onclick="openModal()">Edit Pengajuan</button>
                        </div>
                    @else
                        <div class="container pt-5">
                            <button class="upload-button" onclick="openModal()">Ajukan File</button>
                        </div>
                    @endif
                @endif

                <div id="upload-success"
                    style="display: none; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 8px; margin-top: 10px;">
                </div>
                {{-- Modal milik roles students --}}
                <div id="myModal" class="modal overflow-hidden">
                    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content w-2/5">
                            <span class="close" onclick="closeModal()">&times;</span>
                            
                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                            <input type="hidden" name="assign_by" value="student">
                            <input type="hidden" name="unique_grade_id" value="{{ $subject->grade_id }}">
                            <input type="hidden" name="unique_subject_name" value="{{ $subject->subject_name }}">
                            <input type="hidden" name="unique_id" value="{{ Auth::user()->studentData->id }}">
                            <input type="hidden" name="unique_subject_id" value="{{ $subject->id }}">

                            <div class="w-full flex justify-center">
                                <div class="file-drop-area border-2 border-gray-300 border-dashed rounded-md min-h-[14rem] w-fit px-10 pr-20 hover:border-gray-400 focus:outline-none">
                                    <span class="fake-btn text-small">Choose files</span>
                                    <span class="file-msg">or drag and drop files here</span>
                                    <input class="file-input" name="filenames[]" type="file" {{-- multiple --}} required>
                                </div>
                            </div>

                            <div class="w-full flex justify-center gap-3 pt-10">
                                <button class="button bg-red-500 hover:bg-red-700" type="reset" onclick="resetInput()">Batal</button>
                                @if (count($files) == 0) 
                                    <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">Upload</button>
                                @else
                                    <input type="hidden" name="type" value="replace">
                                    <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">Simpan Perubahan</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            @else
                {{-- Modal milik roles guru --}}
                <div id="myModal" class="modal">
                    <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h2>Materials/Files</h2>
                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                            <input type="hidden" name="assign_by" value="teacher">
                            <input type="hidden" name="unique_grade_id" value="{{ $subject->grade_id }}">
                            <input type="hidden" name="unique_subject_name" value="{{ $subject->subject_name }}">
                            <input type="hidden" name="unique_subject_id" value="{{ $subject->id }}">
  
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
                                @if ($file->grade && $file->grade != '' || $file->grade === 0)
                                    {{ $file->grade }}/100
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

        // drag and drop file input
        var $fileInput = $('.file-input');
        var $droparea = $('.file-drop-area');

        // highlight drag area
        $fileInput.on('dragenter focus click', function() {
        $droparea.addClass('is-active');
        });

        // back to normal state
        $fileInput.on('dragleave blur drop', function() {
        $droparea.removeClass('is-active');
        });

        // change inner text
        $fileInput.on('change', function() {
        var filesCount = $(this)[0].files.length;
        var $textContainer = $(this).prev();

        if (filesCount === 1) {
            // if single file is selected, show file name
            var fileName = $(this).val().split('\\').pop();
            $textContainer.text(fileName);
        } else {
            // otherwise show number of files
            $textContainer.text(filesCount + ' files selected');
        }
        });

        function resetInput()
        {
            $('.file-msg').text('or drag and drop files here');
        }
    </script>
</body>

</html>

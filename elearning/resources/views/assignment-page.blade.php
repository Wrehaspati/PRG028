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
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | ' . $subject->subject_name ) }}{{ ' | ' . Str::substr($subject->time_start, 0, 5) . ' - ' . Str::substr($subject->time_end, 0, 5) }} </h2>
        </x-slot>

        <div style="background-color: #FFFF">
            <div class="w-full flex justify-center">
                <div class="flex justify-between w-4/5 pt-5">
                    <section class="w-3/5">
                        @if (Session::has('msg')) 
                            <div class="bg-green-500 text-white px-5 py-2 rounded mb-2">
                                <div>
                                    {{ date('d M Y - h:i:s', strtotime($assignment->updated_at)) }}
                                </div> 
                                Berhasil untuk '{{ Session::get('msg') }}'
                            </div>
                        @endif
                        <div class="text-lg font-bold">
                            <p>{{ $assignment->assignment_title }} </p>
                        </div>
                        <div class="text-lg">
                            <p>{{ $assignment->description }} </p>
                        </div>
                        <div class="text-lg">
                            @forelse ($teacher_files as $file)
                                @if ($file->assign_by == 'teacher')
                                    <div class="py-2 mt-5 px-10 w-fit bg-gray-100 rounded-lg text-md">
                                        <a class="text-blue-700 hover:text-blue-900 underline" target="_blank"
                                            href="{{ asset($file->path . $file->filename) }}">{{ $file->filename }}</a>
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
                        <p class="text-sm text-red-500">* Dihimbau untuk kirim/ajukan file 10 menit sebelum berakhirnya
                            waktu yang diberikan</p>
                        <p class="text-sm text-red-500">** Harap hubungi guru yang mengajar atau BK jika file tidak
                            dapat diunduh / bermasalah.</p>
                        <div class="text-sm">lampiran ini dibuat pada {{ $assignment->created_at }}</div>

                        @if (isset($files))
                            @foreach ($files as $file)
                                @if ($file->user_id == Auth::user()->id)
                                    <div class="px-10 py-4 mt-4 bg-cyan-100 rounded w-fit">
                                        <div>
                                            File yang diajukan : {{ $file->filename }}
                                            (<a href="{{ asset($file->path . $file->filename) }}" target="_blank"
                                                class="text-blue-500 underline">click to view</a>)
                                            @if ($assignment->status == 'closed')
                                                @if ($file->grade > 50)
                                                    <span
                                                        class="bg-green-500 px-2 py-1 rounded-lg font-bold ml-5 text-white">
                                                        {{ $file->grade }}
                                                    </span>
                                                @elseif ($file->grade <= 50 && $file->grade != 0)
                                                    <span
                                                        class="bg-red-500 px-2 py-1 rounded-lg font-bold ml-5 text-white">
                                                        {{ $file->grade }}
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                        @if ($assignment->status != 'closed')
                                            <form action="{{ Route('files.destroy', $file->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="mt-2 button bg-red-500 hover:bg-red-700"
                                                    onclick="">Batalkan Pengajuan</button>
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
                    
                    @include('assignments/partials/top-right-button')

                </div>
            </div>        
            
            @include('assignments/partials/upload-modal')

            @include('assignments/partials/datatable')

        </div>
    </x-app-layout>

    <script>
        // Script untuk Multiple input file
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });
        });


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

        function resetInput() {
            $('.file-msg').text('or drag and drop files here');
        }
    </script>
</body>

</html>

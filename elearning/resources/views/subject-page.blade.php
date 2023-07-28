<x-app-layout>
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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('E-Learning | ' . $subject->subject_name . ' | ' . $subject->grade_name) }}

        </h2>
        <p>
        <div class="flex">
            <div>
                {{ $subject->day.' > ' . Str::substr($subject->time_start, 0, 5) . ' - ' . Str::substr($subject->time_end, 0, 5) . ' | ' . $subject->teacher_name }}
            </div>
        </div>
        </p>
    </x-slot>

    <div style="background-color: #FFFF" class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
        {{--  tombol di dashboard file matematika --}}
        @if (Auth::user()->role)
            <div class="justify-end flex w-full mb-2">
                <button class="button" onclick="openModal()">Create</button>
                {{-- <button class="button" onclick="openModal()">Edit</button> --}}
            </div>
            <div id="myModal" class="modal">
                <div class="modal-content select-none">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <form action="{{ route('assignment.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col w-full">
                            <h2>Judul <span class="text-red-500">*</span></h2>
                            <input type="hidden" name="subject" value="{{ $subject->id }}">
                            <input type="text" required name="title" placeholder="Tambahkan judul..."
                                class="md:w-2/3 w-full mb-5 shadow-md rounded border border-gray-200">
                        </div>
                        <div>
                            <h2>Deskripsi atau Petunjuk <span class="text-red-500">*</span></h2>
                            <textarea id="taskDescription" class="md:w-2/3 w-full mb-5" name="description" required rows="4" cols="50"
                                placeholder="Tambahkan teks deskripsi ataupun petunjuk..."></textarea>
                        </div>
                        <div class="flex md:flex-row flex-col md:gap-10 gap-5">
                            <div>
                                <h2>Waktu Dibukanya Pengajuan</h2>
                                <input type="datetime-local" class="shadow-md rounded border border-gray-200"
                                    name="from_date">
                            </div>
                            <div>
                                <h2>Waktu Ditutupnya Pengajuan</h2>
                                <input type="datetime-local" class="shadow-md rounded border border-gray-200"
                                    name="due_date">
                            </div>
                        </div>
                        <div class="mt-5">
                            <input type="radio" id="class_material" name="class_material" checked value="hasDeadline">
                            <label for="class_material" class="ml-2">Penugasan dengan batasan waktu diatas</label>
                        </div>
                        <div class="mt-2">
                            <input type="radio" id="class_material" name="class_material" value="open">
                            <label for="class_material" class="ml-2">Penugasan tanpa batasan waktu /
                                deadline</label>
                        </div>
                        <div class="mt-2">
                            <input type="radio" id="class_material" name="class_material" value="reserve">
                            <label for="class_material" class="ml-2">Sembunyikan penugasan hingga batas waktu yang
                                telah ditentukan ('kuis / ulangan')</label>
                        </div>
                        <div class="mt-2">
                            <input type="radio" id="class_material" name="class_material" value="closed">
                            <label for="class_material" class="ml-2">Kunci pengajuan ('materi pertemuan / bahan
                                ajaran')</label>
                        </div>
                        <p class="mt-5"><span class="text-red-500">*</span> wajib untuk diisi</p>
                        <div class="w-full mt-10 flex justify-end">
                            <div>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    type="reset">Delete</button>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- buat naruh hasil/tulisan dari tombol create --}}
            <div id="card" style="display: none;"> </div>
        @endif

        <!--Card kelas-->
        <section class="container" style="">
            <div style="">
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
    </div>
    <script>
        // Memilih elemen tombol dan input file
        const uploadButton = document.querySelector('.upload-button');
        const removeButton = document.querySelector('.remove-button');
        const fileInput = document.getElementById('file-input');
        const fileName = document.getElementById('file-name');
        const uploadSuccess = document.getElementById('upload-success');

        // Mengatur event listener untuk tombol Upload
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

        // Mengatur event listener untuk tombol Remove
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

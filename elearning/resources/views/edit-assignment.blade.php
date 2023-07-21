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

        .container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .button-container button {
            margin: 0 5px;
        }

        .save-button {
            background-color: #19A7CE;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .save-button:hover {
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

        .button-delete:hover {
            background-color: #b70000;
        }

        .container input[type="text"],
        .container textarea {
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
            outline: none;
            width: 100%;
            max-width: 400px;
            margin-bottom: 10px;
            text-align: left;
        }

        .container label,
        .container textarea,
        .container input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="color"></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                E-Learning | Edit Assignment</h2>
        </x-slot>
        <div style="background-color: #FFFF">
            <div class="w-full flex justify-center">
                <div class="flex justify-between w-4/5 pt-5">
                    <section class="w-3/5">
                        <div class="text-lg font-bold">
                            <p>{{ $assignment->assignment_title }} </p>
                        </div>
                        <div class="text-lg">
                            <p>{{ $assignment->description }} </p>
                        </div>
                        <div class="text-lg">
                            {{-- @forelse ($teacher_files as $file)
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
                            @endforelse --}}
                            ditutup sementara waktu
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        // Function to reset the form edit
        function resetForm() {
            document.getElementById("judul").value = "";
            document.getElementById("deskripsi").value = "";
            document.getElementById("file").value = "";

        }
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                E-Learning | Edit grade | {{ $grade->id.' - '.$grade->grade_name }}
            </h2>
        </x-slot>
        <div style="background-color: #FFFF">
            <div class="w-full flex justify-center">
                <div class="flex justify-center w-4/5 pt-5">
                    <section class="md:w-3/5">
                        @if (Session::has('msg')) 
                            <div class="bg-green-500 text-white px-5 py-2 rounded mb-2">
                                <div>
                                    {{ date('d M Y - h:i:s', strtotime($grade->updated_at)) }}
                                </div> 
                                Perubahan '{{ Session::get('msg') }}' telah berhasil dieksekusi!
                            </div>
                        @else 
                            <label for="" class="font-bold">Perubahan terakhir pada {{ date('d M Y - h:i:s', strtotime($grade->updated_at)) }}</label>
                        @endif
                        <form action="{{ route('grade.update', $grade->id) }}" method="POST" class="w-full border border-gray-400 rounded p-5">
                            @csrf
                            @method('PUT')
                            <div class="text-lg font-bold">
                                <label for="id">ID Kelas</label>
                                <input class="w-full border border-gray-400 rounded" type="text" name="id" required
                                    value="{{ $grade->id }}" id="id">
                            </div>
                            <div class="text-lg font-bold mt-5">
                                <label for="grade_name">Nama Kelas</label>
                                <input class="w-full border border-gray-400 rounded" type="text" name="grade_name" required
                                    value="{{ $grade->grade_name }}" id="grade_name">
                            </div>
                            <div class="w-full justify-end flex gap-2 mt-5">
                                <button class="button bg-cyan-500 hover:bg-cyan-700 rounded text-white px-5 py-2" type="submit">Update</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

            
    </x-app-layout>

    <script>
         $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });
        });
    </script>

</body>

</html>

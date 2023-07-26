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
                E-Learning | Edit Assignment
            </h2>
            <div>
                <a href="{{ route('assignment.show', [$grade, Str::slug($subject->subject_name), $assignment->id]) }}" class="text-blue-500 underline">
                    < Back to Subject Page
                </a>
            </div>
        </x-slot>
        <div style="background-color: #FFFF" class="overflow-x-hidden">
            <div class="w-full flex justify-center">
                <div class="flex justify-center w-4/5 pt-5">
                    <section class="md:w-3/5">
                        @if (Session::has('msg')) 
                            <div class="bg-green-500 text-white px-5 py-2 rounded mb-2">
                                <div>
                                    {{ date('d M Y - h:i:s', strtotime($assignment->updated_at)) }}
                                </div> 
                                Perubahan '{{ Session::get('msg') }}' telah berhasil dieksekusi!
                            </div>
                        @else 
                            <label for="" class="font-bold">Perubahan terakhir pada {{ date('d M Y - h:i:s', strtotime($assignment->updated_at)) }}</label>
                        @endif
                        <form action="{{ route('assignment.update', $assignment->id) }}" method="POST" class="w-full border border-gray-400 rounded p-5">
                            @csrf
                            @method('PUT')
                            <div class="text-lg font-bold">
                                <label for="title">Title / Judul</label>
                                <input class="w-full border border-gray-400 rounded" type="text" name="title" required
                                    value="{{ $assignment->assignment_title }}" id="title">
                            </div>
                            <div class="text-lg mt-5">
                                <label for="" class="font-bold">Description / Deskripsi</label>
                                <textarea name="description" class="w-full border border-gray-400 rounded" required id="" cols="30" rows="10">{{ $assignment->description }}</textarea>
                            </div>
                            <div class="w-full justify-end flex gap-2 mt-2">
                                <button class="button bg-cyan-500 hover:bg-cyan-700 rounded text-white px-5 py-2" type="submit">Update</button>
                            </div>
                        </form>
                        <div class="text-lg border border-gray-400 rounded p-5 mt-5 overflow-x-auto">
                            <label for="" class="font-bold">Files</label>
                            @forelse ($teacher_files as $file)
                                @if ($file->assign_by == 'teacher')
                                    <form action="{{ Route('files.destroy', $file->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="flex flex-row gap-2 mb-4">
                                            <div class="py-2 px-10 w-fit bg-gray-100 rounded-lg text-md">
                                                <a class="text-blue-700 hover:text-blue-900 underline" target="_blank"
                                                    href="{{ asset($file->path . $file->filename) }}">{{ $file->filename }}</a>
                                            </div>
                                            <button type="submit"
                                                class="inline py-1 px-4 bg-red-500 hover:bg-red-700 text-white rounded-lg">Delete</button>
                                        </div>
                                    </form>
                                @endif
                            @empty
                                <label for="" class="font-bold">Files</label>
                                <p class="text-green-600">
                                    // pada tempat ini harusnya berisi file soal, ketika guru mengupload
                                    soal dalam bentuk pdf/file
                                </p>
                            @endforelse
                        </div>
                        <div>
                            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-5 border border-gray-400 rounded p-5">
                                    <label for="" class="font-bold">Add Materials/Files</label>
                                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                    <input type="hidden" name="assign_by" value="teacher">
                                    <input type="hidden" name="unique_grade_id" value="{{ $subject->grade_id }}">
                                    <input type="hidden" name="unique_subject_name" value="{{ $subject->subject_name }}">
                                    <input type="hidden" name="unique_subject_id" value="{{ $subject->id }}">
                    
                                    <div class="input-group hdtuto control-group lst increment">
                                        <input type="file" name="filenames[]" class="myfrm form-control md:max-w-[100%] max-w-[20rem]">
                                        <div class="input-group-btn">
                                            <button class="btn-success button bg-green-500 text-white rounded my-2 px-4 py-2" type="button"><i
                                                    class="fldemo glyphicon glyphicon-plus"></i>Add More Files</button>
                                        </div>
                                    </div>
                                    <div class="clone hidden">
                                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                            <input type="file" name="filenames[]" class="myfrm form-control">
                                            <div class="input-group-btn">
                                                <button class="button text-white rounded bg-red-500 hover:bg-red-800 my-2 px-4 py-2 btn-danger"
                                                    type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full justify-end flex gap-2">
                                        <button class="button bg-red-500 hover:bg-red-700 rounded text-white px-5 py-2" type="reset">Cancel</button>
                                        <button class="button bg-cyan-500 hover:bg-cyan-700 rounded text-white px-5 py-2" type="submit">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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

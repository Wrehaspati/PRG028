<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning </title>
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
    </style>


    <x-app-layout>
        <div class="color"></div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-500 leading-tight">
                {{ __('E-Learning | Fisika  Selasa 8:00 - 10:00') }}
            </h2>
        </x-slot>

        <div style="background-color: #FFFF">



            <!--Card kelas-->
            <section style="padding-left: 80px;">
                <div class="teks">
                    <p>Silahkan kerjakan tugas, soal nya ada di flie pdf berikut :</p>
                </div>

                <div class="teks">
                    <p>// pada tempat ini harusnya berisi file soal, ketika guru mengupload soal dalam bentuk pdf/file
                    </p>
                </div>

                <div class="teks">
                    <p>kumpulkan dalam bentuk PDF ya</p>
                </div>

                <div style="display: flex; padding-left: 50px; padding-top: 50px; padding-right : 100px">
                    <div style="flex: 1;">
                        <div class="card-body">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <p style="padding: 20px; border-radius: 8px;">
                                    Tugas | Menghitung Massa Benda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    style="display: flex; padding-left: 50px; padding-top: 20px; padding-bottom:50px; padding-right : 100px">
                    <div style="flex: 1;">
                        <div class="card-body">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <p id="file-name" style="padding: 20px; border-radius: 8px;">
                                    File Upload |
                                </p>
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
            </script>
            <hr style="margin-top: 200px">

            <!--Media Sosial-->
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
    </x-app-layout>

</body>

</html>

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
            <div class="w-100 flex justify-center">
                <div class="container">
                    <h2><b>Form Edit Assignment</b></h2><br>
    
                    <label for="judul">Judul Tugas</label>
                    <input type="text" id="judul" name="judul"><br>
    
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="8"></textarea><br>
    
                    <label for="file">File </label>
                    <input type="file" id="file" name="file"><br>
    
                    <div class="button-container">
                        <button class="save-button">Save</button>
                        <button class="button-delete" onclick="resetForm()">Reset</button>
                    </div>
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
        // Function to reset the form edit
        function resetForm() {
            document.getElementById("judul").value = "";
            document.getElementById("deskripsi").value = "";
            document.getElementById("file").value = "";

        }
    </script>

</body>

</html>

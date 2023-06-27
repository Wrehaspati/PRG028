<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-learning </title>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .color {
            background-color: #FFFF
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
            <section class="container" style="padding-left: 80px;">
                <div style="display: flex; padding-left: 100px; padding-top: 100px; padding-right : 100px"">
                    <div style="flex: 1;">
                        <a href="{{ Route('dashboard.filefisika') }}">
                            <div class="card-body">
                                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    <p style="padding: 20px; border-radius: 8px; ">
                                        Tugas 1 | Menghitung Massa Benda
                                    </p>
                                </div>

                            </div>
                        </a>
                        <p style="text-decoration: underline; padding-top: 20px">
                            <a href="{{ Route('dashboard.filefisika') }}"> Silahkan buatlah tugas berikut kerjakan
                                format pdf.</a>

                        </p>
                    </div>


                </div>


            </section>

            <hr style="margin-top: 200px">

            <!--Media Sosial-->
            <section style="padding-bottom: 50px; padding-top : 30px; padding-left : 110px;">
                <div class="container">
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

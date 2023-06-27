<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>E-learning</title>
<style>
    .color {
        background-color: #FFFF
    }

    .card-box1 {
        width: 278px;
        height: 60px;
        background-color: #FF5454;
    }

    .card-box2 {
        width: 278px;
        height: 60px;
        background-color: #00F645;
    }

    .card-box3 {
        width: 278px;
        height: 60px;
        background-color: #8E7F7F;
    }

    .card-box4 {
        width: 278px;
        height: 60px;
        background-color: #9F25E9;
    }

    .card-box5 {
        width: 278px;
        height: 60px;
        background-color: #DE05A1;
    }

    .card-box6 {
        width: 278px;
        height: 60px;
        background-color: #FF0000;
    }
</style>


<x-app-layout>
    <div class="color"></div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('E-Learning') }}
        </h2>
    </x-slot>

    <div style="background-color: #FFFF">

        <!--Card kelas-->
        <section class="container" style="padding-left: 80px;">
            <div style="display: flex; padding-left: 100px; padding-top: 100px;">
                <div style="flex: 1;">
                    <a href="{{ Route('dashboard.matematika') }}">
                        <div class="card-box1">
                            <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">Matematika</p>
                        </div>
                        <div class="card-body">
                            <div class="card" style="width: 18rem; border: 0;">
                                <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                    class="card-img-top" alt="gambar"
                                    style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            </div>
                        </div>
                    </a>
                </div>

                <div style="flex: 1;">
                    <div class="card" style="width: 18rem; border: 0;">
                        <a href="{{ Route('dashboard.fisika') }}">
                            <div class="card-box2">
                                <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">Fisika</p>
                            </div>
                            <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                class="card-img-top" alt="gambar"
                                style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        </a>
                    </div>
                </div>

                <div style="flex: 1;">
                    <div class="card" style="width: 18rem; border: 0;">
                        <a href="{{ Route('dashboard.senibudaya') }}">
                            <div class="card-box3">
                                <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">Seni Budaya</p>
                            </div>
                            <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                class="card-img-top" alt="gambar"
                                style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">

                        </a>
                    </div>
                </div>
            </div>


            <div style="display: flex; padding-left: 100px; padding-top: 100px;">
                <div style="flex: 1;">
                    <div class="card" style="width: 18rem; border: 0;">
                        <a href="{{ Route('dashboard.kimia') }}"">
                            <div class="card-box4">
                                <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">Kimia</p>
                            </div>
                            <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                class="card-img-top" alt="gambar"
                                style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        </a>
                    </div>
                </div>

                <div style="flex: 1;">
                    <div class="card" style="width: 18rem; border: 0;">
                        <a href="{{ Route('dashboard.kewirausahaan') }}">
                            <div class="card-box5">
                                <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">Kewirausahaan</p>
                            </div>
                            <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                class="card-img-top" alt="gambar"
                                style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        </a>
                    </div>
                </div>
                <div style="flex: 1;">
                    <div class="card" style="width: 18rem; border: 0;">
                        <a href="{{ Route('dashboard.PPKN') }}"">
                            <div class="card-box6">
                                <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">PPKN</p>
                            </div>
                            <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                                class="card-img-top" alt="gambar"
                                style="float: left; margin-right: 20px; padding-left: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <hr style="margin-top: 50px">

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

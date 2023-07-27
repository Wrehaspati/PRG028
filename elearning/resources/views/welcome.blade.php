<title>E-learning</title>
<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        }

        .bg-custom {
            background-color: #19A7CE !important;
        }

        /* Tambahkan class "card-animation" pada elemen kartu */
        .card-animation {
            transition: transform 0.4s;
            display: flex;

        }

        .card-animation:hover {
            transform: translateY(-5px);
        }

        .profile-pic img {
            border-radius: 10%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-2.1rem);
            }

            100% {
                transform: translateY(0);
            }
        }

        .biru {
            color: #19A7CE;
        }
    </style>

    <body class="antialiased w-full">
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:history.go(0)">
                    <h4>E-learning</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link mx-2 active" aria-current="page" href="javascript:history.go(0)">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="background: #fff">

            <!--isi-->
            <section>
                <div class="flex justify-between">
                    <div style="" class="">
                        <h2 class="mt-5 ml-10 md:ml-16">E-learning <span class="biru">SMK
                                Antartika</span></h2>
                        <p class="mt-2 mx-10 md:mx-16 lg:w-2/3 text-justify">
                            E-Learning merupakan Learning Management System (LMS) untuk menjalankan perkuliahan secara
                            online
                            berbasis Moodle LMS di SMK Antartika. E-learning sebagai aplikasi berbasis internet yang
                            mampu
                            menghubungkan pendidik dan peserta didik secara online. E-learning diciptakan untuk
                            mengatasi segala
                            halangan yang mungkin ditemukan tenaga pendidik dan peserta didik, yakni dalam hal ruang,
                            waktu, keadaan,
                            dan kondisi.
                        </p>
                        <div class="mt-5 md:ml-16 gap-4 flex w-full md:justify-start justify-center pb-20">
                            <a href="{{ route('login') }}"
                                class="no-underline button bg-green-500 hover:bg-green-700 text-white px-5 py-2 rounded shadow">Masuk</a>
                            <a href="{{ route('register') }}"
                                class="no-underline button bg-cyan-500 hover:bg-cyan-700 text-white px-5 py-2 rounded shadow">Daftar</a>
                        </div>
                    </div>
                    <div class="profile-pic hidden lg:block pr-40 py-20 w-[40%]">
                        <img src="https://ouch-cdn2.icons8.com/OQ3yuVTnKqAb4khnDpO7_KBTgYEZFOxQQSTIg3787mg/rs:fit:256:458/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTYz/L2Q3ZTAzZDAzLWIw/MGQtNDgyMi05OWQ1/LTMxMmVhMTJkNTY3/My5wbmc.png"
                            class="w-[16rem]">
                    </div>
                </div>

            </section>

            <!--Card informasi-->
            <section class="container">
                <div class="flex flex-wrap gap-5 justify-center">
                    <div style="">
                        <div class="card-animation">
                            <div class="card" style="width: 18rem; border: 0;">
                                <img src="https://ouch-cdn2.icons8.com/c8X8JV_FXP35_r0FcqHwwkfGgUxlgZW1ezLDO1_P2aM/rs:fit:256:167/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNjcw/L2RjOWU5ODFmLTc2/OTEtNDhjMC1iOGE1/LTE3YTc5OWU0Y2Fm/My5wbmc.png"
                                    class="card-img-top" alt="gambar" style="float: left; margin-right: 20px;">
                                <div class="card-body" style="text-align: center;">
                                    <p class="card-text"> <b>DI MANA PUN - KAPAN PUN</b><br>
                                        Tidak terhalang waktu dan jarak, pengajar maupun peserta didik dapat mengakses
                                        kegiatan
                                        pembelajaran dengan bebas</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="">
                        <div class="card-animation">
                            <div class="card" style="width: 18rem; border: 0;">
                                <img src="https://ouch-cdn2.icons8.com/ksrMREdD0FKcX6FhoIhIDQQ3xziwiehnzqEwZ85ROOo/rs:fit:256:178/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNTk4/LzFjMTQzYjJjLTFl/MzEtNDFhZS1hNzU4/LTA5MmEzOTdhYmNj/Mi5wbmc.png"
                                    class="card-img-top" alt="gambar"
                                    style="float: left; margin-right: 20px; width: 17rem">
                                <div class="card-body" style="text-align: center;">
                                    <p class="card-text"><b>AKSES MUDAH</b> <br>
                                        Tanpa halangan, peserta didik maupun pengajar dapat melaksanakan kegiatan
                                        pembelajaran
                                        dalam
                                        situasi apapun</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="">
                        <div class="card-animation">
                            <div class="card" style="width: 18rem; border: 0;">
                                <img src="https://ouch-cdn2.icons8.com/-vVVU0ytD19Goilrknwy2AvD8Hdl5hOd0QA_Dfj18ds/rs:fit:256:162/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNzE3/LzQ4NmM0ZmJmLTQ0/MWItNDlkOS05NzE1/LTJmYjgxNzQ5Zjg4/OS5wbmc.png"
                                    class="card-img-top" alt="gambar" style="float: left; margin-right: 20px;">
                                <div class="card-body" style="text-align: center;">
                                    <p class="card-text"><b>TERPADU</b><br>
                                        Bukti dan hasil kegiatan pembelajaran dikelola secara otentik dan obyektif
                                        sehingga
                                        mudah
                                        diaudit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin-top: 50px">

            <!--Media Sosial-->
            <section style="padding-bottom: 50px">
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
        </div>
        <!--Footer-->
        <footer style="background-color: #F2F2F2; padding: 40px;">
            <div style="text-align: center;">
                <span>@elearning2023</span>
                <br>
                <span>You are not logged in. (<a href="{{ route('login') }}">Log in</a>)</span>
            </div>
        </footer>

</x-guest-layout>

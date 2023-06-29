<title>E-learning</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .tengah {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }

    .card {
        width: 260px;
        height: 250px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin: 10px;
        cursor: pointer;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        max-width: 100px;
        max-height: 100px;
        margin-bottom: 10px;
    }

    h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('E-Learning | Dashboard Admin') }}
        </h2>
    </x-slot>
    <div style="background-color: #FFFF">

        <div class="tengah">
            <a href="{{ Route('management.kelas') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Kelas">
                <h3>Management Kelas</h3>
            </a>

            <a href="{{ Route('management.siswa') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Siswa">
                <h3>Management Siswa</h3>
            </a>

            <a href="{{ Route('management.guru') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Guru">
                <h3>Management Guru</h3>
            </a>
            <a href="{{ Route('management.matapembelajaran') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Guru">
                <h3>Management Mata Pembelajaran</h3>
            </a>
            <a href="{{ Route('file.tersimpan') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Guru">
                <h3>File Tersimpan</h3>
            </a>


        </div>
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


</x-app-layout>

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
        <div class="w-full flex justify-center">
            <section class="container w-full">
                <div class="flex flex-wrap justify-start gap-5">
                    @foreach ($courses as $subject) 
                        @php
                            $arr = ['rgb(239 68 68)','rgb(249 115 22)','rgb(245 158 11)','rgb(234 179 8)','rgb(132 204 22)','rgb(132 204 22)','rgb(16 185 129)','rgb(20 184 166)','rgb(6 182 212)','rgb(14 165 233)','rgb(59 130 246)','rgb(99 102 241)','rgb(124 58 237)','rgb(168 85 247)','rgb(217 70 239)','rgb(236 72 153)','rgb(244 63 94)'];
                            $color = $arr[rand(0,16)];
                        @endphp
                        <x-grade-card :$subject class="pb-4" style="background-color: {{ $color }}" />
                    @endforeach
                </div>
            </section>
        </div>

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

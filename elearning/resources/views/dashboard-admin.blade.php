<title>E-learning</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .tengah {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */

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
    <div style="background-color: #FFFF" class="h-2/5">

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
            <a href="{{ Route('files.index') }}" class="card">
                <img src="https://ouch-cdn2.icons8.com/-ndYHeBSrcrOouvEnXsy6uOKNWSLihJ2STG50VGMI1Q/rs:fit:256:182/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvOTU3/L2FhODZlY2RjLTdi/NGItNDA2YS04MTZh/LTQ2NTk5NDk4ZmEx/MC5wbmc.png"
                    alt="Management Guru">
                <h3>File Tersimpan</h3>
            </a>
        </div>
    </div>
    <hr><br>
    <div class="tengah">
        <div class="w-full flex justify-center">
            <section class="container w-full">
                <div class="flex flex-wrap gap-5 justify-center" style="padding-right: 30px; padding-left: 30px;">
                    @forelse ($subjects as $subject)
                        @php
                            $arr = ['rgb(239 68 68)', 'rgb(249 115 22)', 'rgb(245 158 11)', 'rgb(234 179 8)', 'rgb(132 204 22)', 'rgb(132 204 22)', 'rgb(16 185 129)', 'rgb(20 184 166)', 'rgb(6 182 212)', 'rgb(14 165 233)', 'rgb(59 130 246)', 'rgb(99 102 241)', 'rgb(124 58 237)', 'rgb(168 85 247)', 'rgb(217 70 239)', 'rgb(236 72 153)', 'rgb(244 63 94)'];
                            $color = $arr[rand(0, 16)];
                        @endphp
                        <x-grade-card :$grade :$subject class="pb-4"
                            style="background-color: {{ $color }}" />
                    @empty
                        <h1 class="text-[1.5rem] pt-12">
                            Belum ada kelas... Harap Hubungi Guru / Administrator
                        </h1 class="font-lg">
                    @endforelse
                </div>
            </section>
        </div>
    </div>


</x-app-layout>

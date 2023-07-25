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
    <x-slot name="navigation">
        @if (isset($courses))
            @include('layouts.navigation', ['courses' => $courses])
        @else
            @include('layouts.navigation')
        @endif
    </x-slot>

    <div class="color"></div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('E-Learning') }}
        </h2>
    </x-slot>

    <div style="background-color: #FFFF" class="min-h-screen">

        <!--Card kelas-->

        <div class="w-full flex justify-center">
            <section class="w-full">
                <div class="flex flex-wrap gap-5 justify-center" style="padding-right: 30px; padding-left: 30px;">
                    <!-- Tambahkan margin-left dan margin-right negatif -->
                    @forelse ($courses as $subject)
                        @php
                            $arr = ['rgb(239 68 68)', 'rgb(249 115 22)', 'rgb(245 158 11)', 'rgb(234 179 8)', 'rgb(132 204 22)', 'rgb(132 204 22)', 'rgb(16 185 129)', 'rgb(20 184 166)', 'rgb(6 182 212)', 'rgb(14 165 233)', 'rgb(59 130 246)', 'rgb(99 102 241)', 'rgb(124 58 237)', 'rgb(168 85 247)', 'rgb(217 70 239)', 'rgb(236 72 153)', 'rgb(244 63 94)'];
                            $color = $arr[rand(0, 16)];
                        @endphp
                        <x-grade-card :$grade :$subject class="pb-4"
                            style="background-color: {{ $color }}" />
                    @empty
                        <h1 class="text-[1.5rem] pt-12">
                            Kelas belum tersedia. Harap Hubungi Guru / Administrator
                        </h1 class="font-lg">
                    @endforelse
                </div>
            </section>
        </div>
    </div>
    </div>
</x-app-layout>

<style>
    /* Tambahkan class "card-animation" pada elemen kartu */
    .card-animation {
        transition: transform 0.4s;
        display: flex;

    }

    .card-animation:hover {
        transform: translateY(-5px);
    }
</style>

<div class="card-animation">
    <div class="py-3 max-w-[23rem] min-w-[23rem]" style="flex: 1;">
        @if (Auth::user()->role)
            <a href="{{ Route('course.show', [Str::slug($subject->grade_id), Str::slug($subject->subject_name)]) }}">
            @else
                <a href="{{ Route('course.show', [Str::slug($grade->id), Str::slug($subject->subject_name)]) }}">
        @endif
        <div {{ $attributes }}>
            <div class="flex justify-between text-white pt-4 px-4">
                <div class="flex flex-col w-full">
                    <div class="flex flex-row">
                        <div>
                            {{ $subject->subject_name }}
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div>{{ $subject->day . '' }}</div>
                        <div>
                            {{ '. | ' . Str::substr($subject->time_start, 0, 5) . ' - ' . Str::substr($subject->time_end, 0, 5) }}
                        </div>
                    </div>
                    <div class="text-sm">
                        @if ($subject->grade_name) 
                            {{ $subject->grade_name }}
                        @else 
                            {{ $grade->grade_name }}
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="{{-- card-body --}} flex w-full justify-center"
            style="/* float: left; margin-right: 20px; padding-left: 20px; */ box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <div class="{{-- card --}}" style="width: 19rem; border: 0;">
                <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                    class="{{-- card-img-top --}} w-full" alt="gambar">
            </div>
        </div>
        </a>
    </div>
</div>

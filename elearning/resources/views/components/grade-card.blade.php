<div class="py-3 max-w-[23rem]" style="flex: 1;">
    <a href="{{ url('/course'.'/'.$subject->id) }}">
        <div {{ $attributes }}>
            <p style="color: #FFFF; padding-top: 20px; padding-left: 20px;">{{ $subject->subject_name }}</p>
        </div>
        <div class="{{-- card-body --}} flex w-full justify-center" style="/* float: left; margin-right: 20px; padding-left: 20px; */ box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <div class="{{-- card --}}" style="width: 19rem; border: 0;">
                <img src="https://ouch-cdn2.icons8.com/-JpvKrmYor_iTQt6MJ62qwiumoO07rsjuIHXoC9zdDQ/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvODk5/L2ZkOGRlOWI5LTcx/MDgtNGZiNi05YmNm/LTcyMmU3Yzc3YzY4/Ni5wbmc.png"
                    class="{{-- card-img-top --}} w-full" alt="gambar">
            </div>
        </div>
    </a>
</div>
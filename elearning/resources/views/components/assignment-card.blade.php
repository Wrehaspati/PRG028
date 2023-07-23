<style>
    /* Tambahkan class "card-animation" pada elemen kartu */
    .card-animation {
        transition: transform 0.4s;


    }

    .card-animation:hover {
        transform: translateY(-5px);
    }
</style>
@if(!Auth::user()->role && $assignment->status == 'reserve')
    <div class="select-none">
        <div class="card-body py-2">
            <div class="card bg-gray-200 flex flex-row justify-between" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 8px; ">
                <div>
                    {{ $assignment->assignment_title }}
                </div>
                <div class="bg-red-500 text-white px-2 rounded-lg">
                    Dibuka pada {{ date('d M Y - h:i', strtotime($assignment->from_date)) }}
                </div>
            </div>
        </div>
    </div>
@else
    <div class="card-animation">
        <a href="{{ route('course.assignment', [$subject->grade_id, Str::slug($subject->subject_name), $assignment->id]) }}">
            <div class="card-body py-2">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                    <p style="padding: 20px; border-radius: 8px; ">
                        {{ $assignment->assignment_title }}
                    </p>
                </div>
            </div>
        </a>
    </div>
@endif

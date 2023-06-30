<a href="{{ route('course.assignment', [$subject->grade_id, Str::slug($subject->subject_name), $assignment->id]) }}">
    <div class="card-body py-2">
        <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <p style="padding: 20px; border-radius: 8px; ">
                {{ $assignment->assignment_title }}
            </p>
        </div>
    </div>
</a>
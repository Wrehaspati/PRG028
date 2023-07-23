<div class="flex flex-col">
    <div class="flex">
        @if ($assignment->status == 'closed')
            <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="20px" height="20px">
                <path
                    d="M 26.980469 5.9902344 A 1.0001 1.0001 0 0 0 26.292969 6.2929688 L 11 21.585938 L 4.7070312 15.292969 A 1.0001 1.0001 0 1 0 3.2929688 16.707031 L 10.292969 23.707031 A 1.0001 1.0001 0 0 0 11.707031 23.707031 L 27.707031 7.7070312 A 1.0001 1.0001 0 0 0 26.980469 5.9902344 z" />
            </svg>
            <p class="pl-2">
                Pengajuan dikunci pada {{ date('h:i:s - d M Y', strtotime($assignment->updated_at)) }}
            </p>
        @elseif($assignment->status == 'hasDeadline')
            <div class="flex flex-col">
                <div class="block">
                    Pengajuan akan dikunci pada pukul
                    <p class="inline underline font-bold">{{ date('h:i', strtotime($assignment->due_date)) }}</p>
                    tanggal
                    <p class="inline underline font-bold">{{ date('d M Y', strtotime($assignment->due_date)) }}</p>
                </div>
                <div>
                    Waktu yang tersisa adalah
                    <p class="inline underline font-bold">
                        @php
                            if ($remain_time >= 0) {
                                $time_left = $remain_time;
                            
                                $days = floor($time_left / 86400); // 86400 seconds in a day
                                $time_left = $time_left % 86400;
                            
                                $hours = floor($time_left / 3600); // 3600 seconds in an hour
                                $time_left = $time_left % 3600;
                            
                                $minutes = floor($time_left / 60); // 60 seconds in a minute
                                $seconds = $time_left % 60;
                            
                                if ($days != 0):
                                    echo $days . ' Hari ';
                                endif;
                                if ($hours != 0):
                                    echo $hours . ' Jam ';
                                endif;
                                echo $minutes . ' Menit ' . $seconds . ' Detik';
                            } else {
                                echo '0 - Pengajuan akan segera ditutup...';
                            }
                        @endphp
                    </p>
                </div>
            </div>
        @endif
    </div>
    <div class="flex justify-end gap-2 h-fit">
        @if (Auth::user()->role)
            @if (count($files) == 0)
                <form action="{{ Route('assignments.destroy', $assignment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button bg-red-500 hover:bg-red-700" onclick="">Delete</button>
                </form>
            @endif
            <form action="{{ Route('assignment.close', $assignment->id) }}" method="POST">
                @csrf
                @if ($assignment->status == 'closed')
                    <input type="hidden" name="status" value="open">
                    <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">
                        Buka Kunci Pengajuan
                    </button>
                @else
                    <input type="hidden" name="status" value="closed">
                    <button class="button bg-green-500 hover:bg-green-700" type="submit">
                        Kunci Pengajuan
                    </button>
                @endif
            </form>

            @if (count($teacher_files) == 0)
                <a class="button m-0" onclick="openModal()">Upload Files</a>
            @else
                <a class="button m-0" href="{{ route('course.edit', [$subject->grade_id, Str::slug($subject->subject_name), $assignment->id] ) }}">Edit Assignment</a>
            @endif
        @endif
    </div>
</div>

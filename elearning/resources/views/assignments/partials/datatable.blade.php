@if (Auth::user()->role)
    <br>
    <hr> <br><br>
    <table class="tengah">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Filename (click to view)</th>
            <th>Grades</th>
            <th>Action Grade</th>
        </tr>
        @forelse ($files as $file)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $file->student_id }}</td>
                <td>{{ $file->student_name }}</td>
                <td><a class="text-blue-500 underline" href="{{ asset($file->path . $file->filename) }}"
                        target="_blank">{{ $file->filename }}</a></td>
                <td id="grade-1">
                    @if (($file->grade && $file->grade != '') || $file->grade === 0)
                        {{ $file->grade }}/100
                    @else
                        {{ __('Belum dinilai') }}
                    @endif
                </td>
                <td>
                    @if ($file->grade && $file->grade != '')
                        <button class="grade-button rounded"
                            onclick="showGradeModal({{ $file->id }}, {{ $file->grade }})">Edit nilai</button>
                    @else
                        <button class="grade-button rounded" onclick="showGradeModal({{ $file->id }})">Beri
                            nilai</button>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada file yang terkirim</td>
            </tr>
        @endforelse

        <div id="grade-modal" class="modal">
            <div class="modal-content">
                <form action="{{ route('file.grade') }}" method="POST">
                    @csrf
                    <span class="close" onclick="closeGradeModal()">&times;</span>
                    <h2>Grades</h2>
                    <input type="number" max="100" min="0" class="w-1/5" id="grade-input" name="grade"
                        class="grade-input" placeholder="Enter grade" />
                    <input type="hidden" id="form-hidden-id" name="file_id">
                    <button class="button" onclick="saveGrade()">OK</button>
                </form>
            </div>
        </div>
    </table>
@endif

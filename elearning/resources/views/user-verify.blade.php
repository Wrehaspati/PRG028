@if (isset($isTeacher)) 
    <form action="{{ route('verification.request') }}" method="POST">
        @csrf
        <label for="">Please enter the token</label>
        <input type="text" name="token" required>
        <button type="submit">submit</button>
    </form>
@elseif(isset($isWaiting))
    Form sedang dalam proses verifikasi oleh admin
@else 
    <form action="{{ route('verification.request') }}" method="POST">
        @csrf
        <label for="nim">NIM</label>
        <input type="text" name="id" id="nim" required>
        <label for="nama">Nama</label>
        <input type="text" name="name" id="nama" required>
        <label for="grade">Kelas</label>
        <select name="grade" id="grade" required>
            <option value="" disabled selected>--- Pilih Kelas ---</option>
            @forelse ($grades as $grade) 
                <option value="{{ $grade->id }}">{{ $grade->id.' | '.$grade->grade_name }}</option>
            @empty 
                <option value="" disabled>--- Belum ada kelas ---</option>
            @endforelse
        </select>
        <button type="submit">submit</button>
    </form>
@endif
<title>E-learning</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    .center-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .center-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .center-form label,
    .center-form select,
    .center-form input {
        width: 100%;
        height: 2rem;
    }

    select,
    input {
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .center-form button {
        width: 50%;
        color: #FFF;
        background-color: #19A7CE;
        border-color: #19A7CE;
    }

    .center-form button:hover {
        background-color: #1B6B93;
        border-color: #1B6B93;
        color: #FFF
    }

    img {
        width: 150px;
    }

    span {
        color: #19A7CE;
    }

    h2 {
        padding-top: 2rem;
    }

    .profile-pic img {
        border-radius: 5%;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-1.0rem);
        }

        100% {
            transform: translateY(0);
        }
    }

    h3 {
        color: #000;
    }
</style>

<div style="background-color: #FFFF" class="h-2/5 center-container">
    @if (isset($isTeacher))
        <form action="{{ route('verification.request') }}" method="POST" class="center-form px-5">
            @csrf
            <label for="">Please enter the token</label>
            <input type="text" name="token" required>
            <button type="submit" class="btn btn-info mt-3">Submit</button>
        </form>
    @elseif(isset($isWaiting))
        <div class="profile-pic">
            <img src="https://ouch-cdn2.icons8.com/cdUENUlEcpDq26Hvjr1N2Arngx1EprDeOhugbk65bTc/rs:fit:256:256/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNTgw/LzczNDU1Y2QyLTc5/OWQtNGJjMy04OGI0/LWMzMjRhMDU5ZTJk/MC5wbmc.png"
                alt="Sample image" style="width: 200px">
        </div>
        <h3>Form sedang dalam proses verifikasi oleh admin <i class='bx bx-loader-alt bx-spin'
                style='color:#38b3dc'></i></h3>
    @else
        <form action="{{ route('verification.request') }}" method="POST" class="center-form p-5">
            @csrf
            <div class="profile-pic">
                <img src="https://ouch-cdn2.icons8.com/rv5oyt-SmybYBzg0nzdoB-YGN0O3HED21kJRZe9Ft4o/rs:fit:256:296/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNzQ2/L2I1ZTFlZDg1LWZk/NDMtNGIzYS1hNzhm/LTk2NWMwMDhkNGI0/Yi5wbmc.png"
                    alt="Sample image">
            </div>
            <h2 style="text-align : center;">Verifikasi<span> Siswa</span> </h2>
            <label for="nim">NIM</label>
            <input type="text" name="id" id="nim" required><br>
            <label for="nama">Nama</label>
            <input type="text" name="name" id="nama" required><br>
            <label for="grade">Kelas</label>
            <select name="grade" id="grade" required class="border">
                <option value="" class="text-center" disabled selected>--- Pilih Kelas ---</option>
                @forelse ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->id . ' | ' . $grade->grade_name }}</option>
                @empty
                    <option value="" disabled>--- Belum ada kelas ---</option>
                @endforelse
            </select><br>
            <button type="submit" class="btn btn-info mt-2">Submit</button>
            <a href="{{ route('user.logout') }}" class="mt-3">Logout / Batalkan</a>
        </form>
    @endif
</div>

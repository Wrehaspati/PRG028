<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<title>E-learning</title>
<style>
    .profile-pic img {
        border-radius: 10%;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-1.1rem);
        }

        100% {
            transform: translateY(0);
        }
    }

    span {
        color: #00C4FF;
    }

    p {
        text-align: center;
    }
</style>
<x-guest-layout>
    <div class="w-full flex justify-center">
        <div class="md:w-[28%] mt-6 px-20 py-10 bg-white md:shadow-md overflow-hidden sm:rounded-lg">
            <div class="row flex justify-center items-center">
                <div class="profile-pic pt-4" style="width: 8rem;">
                    <img src="https://ouch-cdn2.icons8.com/LrhfS-eCsl60egaEkTUmSswM-wxzjuj93-rvWVl86wE/rs:fit:256:447/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvMTgv/MWVkNzRjMzItM2Nj/NS00ZjViLWI1MjYt/NzQ5MTFjNGVlZTQ0/LnBuZw.png"
                        alt="Sample image">
                </div>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                crossorigin="anonymous"> --}}

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <section class="flex flex-col gap-4" class="card">
                    <!-- Email Address -->
                    <div class="flex-col flex justify-center items-center">
                        <div class="flex block">
                            <p>Welcome ! <i class='bx bx-id-card bx-tada' style='color:#29aee7'></i></p>
                        </div>
                        <h1 class="text-[2.5rem] font-bold" style="text-align : center;"> Log<span>in</span></h1>
                    </div>

                    <div class="">
                        <x-input-label for="email" :value="__('Username')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <!--button login-->
                    <x-primary-button class="btn btn-primary flex justify-center" style="align-items: center">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <!-- Remember Me -->
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="col-md-6 col-lg-9 d-flex align-items-center">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgotten your password ? click') }}
                            </a>
                            <br><br>
                        @endif
                    </div>
            </form>
            </section>
        </div>
    </div>
</x-guest-layout>

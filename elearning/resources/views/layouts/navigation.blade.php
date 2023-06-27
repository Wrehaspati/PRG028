<style>
    #menu__toggle {
        opacity: 0;
    }

    #menu__toggle:checked+.menu__btn>span {
        transform: rotate(45deg);
    }

    #menu__toggle:checked+.menu__btn>span::before {
        top: 0;
        transform: rotate(0deg);
    }

    #menu__toggle:checked+.menu__btn>span::after {
        top: 0;
        transform: rotate(90deg);
    }

    #menu__toggle:checked~.menu__box {
        left: 0 !important;
    }

    .menu__btn {
        position: fixed;
        top: 20px;
        left: 20px;
        width: 26px;
        height: 26px;
        cursor: pointer;
        z-index: 1;
    }

    .menu__btn>span,
    .menu__btn>span::before,
    .menu__btn>span::after {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #100f0f;
        transition-duration: .25s;
    }

    .menu__btn>span::before {
        content: '';
        top: -8px;
    }

    .menu__btn>span::after {
        content: '';
        top: 8px;
    }

    .menu__box {
        display: block;
        position: fixed;
        top: 0;
        left: -100%;
        width: 300px;
        height: 100%;
        margin: 0;
        padding: 80px 0;
        list-style: none;
        background-color: #ECEFF1;
        box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
        transition-duration: .25s;
    }

    .menu__item {
        display: block;
        padding: 12px 24px;
        color: #494646;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition-duration: .25s;
    }

    .menu__item:hover {
        background-color: #19A7CE;
    }
</style>


<nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style="background-color: #19A7CE">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!--Hamburger menu sliding-->
                <div class="hamburger-menu">
                    <input id="menu__toggle" type="checkbox" />
                    <label class="menu__btn" for="menu__toggle">
                        <span></span>
                    </label>

                    <ul class="menu__box" style="background-color : #ffff">
                        <li style="padding-left : 40px;"><a class="menu__item" href="{{ Route('course.index') }}">Dashboard
                            </a></li>
                        <br>
                        <li style="font-size :25px; text-align : center"><a>
                                <h1>My Class</h1>
                            </a></li>

                        <li style="padding-left : 40px;"><a class="menu__item"
                                href="">Matematika <br>
                                Senin 8:00 - 10:00 </a></li>
                        <li style="padding-left : 40px;"><a class="menu__item"
                                href="">Fisika <br>
                                Selasa 8:00 - 10:00 </a></li>
                        <li style="padding-left : 40px;"><a class="menu__item"
                                href="">Seni Budaya <br>
                                Rabu 8:00 - 10:00 </a></li>
                        <li style="padding-left : 40px;"><a class="menu__item"
                                href="">Kimia <br>
                                Kamis 8:00 - 10:00</a></li>
                        <li style="padding-left : 40px;"><a class="menu__item"
                                href="">Kewirausahaan <br>
                                Jumat 8:00 - 10:00 </a></li>
                        <li style="padding-left : 40px;"><a class="menu__item" href="">PPKN
                                <br>
                                Sabtu 8:00 - 10:00 </a></li>
                    </ul>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-0 sm:flex">
                    <x-nav-link :href="route('course.index')" :active="request()->routeIs('course.index')" style="color: #fff;">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Auth::user()->role) 
                            <x-dropdown-link :href="route('profile.edit')">
                                    halo {{ Auth::user()->role->role }}
                            </x-dropdown-link>
                        @endif
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('course.index')" :active="request()->routeIs('course.index')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

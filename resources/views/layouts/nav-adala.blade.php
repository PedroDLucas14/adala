    <header>
        <nav x-data="{ open: false }" class="fixed top-0 w-full z-10 bg-sky-300 border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-4">
                <!-- Logo -->
                <a href="https://adala25.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('img/logo.jpeg') }}" class="h-8" alt="Logo ADALA" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ADALA</span>
                </a>

                <!-- Hamburger -->
                <div class="md:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 dark:text-gray-400 dark:hover:bg-gray-700 focus:ring-gray-200 dark:focus:ring-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Main menu -->
                <div :class="{ 'block': open, 'hidden': !open }" class="w-full md:block md:w-auto">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-sky-300 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                        <!-- Dropdown -->
                        <li class="p-4">
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-4 py-2 text-sm text-gray-900 rounded-sm md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                        ADALA
                                        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 20 20"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7l3 3 3-3" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('sobreNosotros')">¿Quiénes somos?</x-dropdown-link>
                                    <x-dropdown-link :href="route('objetivos')">Nuestros objetivos</x-dropdown-link>
                                    <x-dropdown-link :href="route('porQueAdala')">¿Por qué ADALA?</x-dropdown-link>
                                    <x-dropdown-link :href="route('documentos')">Documentación</x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </li>

                        <li class="p-4">
                            <x-nav-link :href="route('home')"
                                class="block py-2 px-4 text-gray-900 rounded-sm dark:text-white dark:hover:bg-gray-700 no-underline">{{ __('Eventos') }}</x-nav-link>
                        </li>

                        <li class="p-4">
                            <x-nav-link :href="route('home')"
                                class="block py-2 px-4 text-gray-900 rounded-sm dark:text-white dark:hover:bg-gray-700">{{ __('Contactanos') }}</x-nav-link>
                        </li>

                        @auth
                            <li class="p-4">
                                <a href="{{ url('/dashboard') }}"
                                    class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dashboard</a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-primary-button class="ms-3">
                                    {{ __('Desconectar') }}
                                </x-primary-button>
                            </form>
                        @else
                            <li class="p-4">
                                <x-nav-link :href="route('login')"
                                    class="block py-2 px-3 text-gray-900 rounded-sm dark:text-white dark:hover:bg-gray-700">Iniciar
                                    sesión</x-nav-link>
                            </li>
                            @if (Route::has('register'))
                                <li class="p-4">
                                    <x-nav-link :href="route('register')"
                                        class="block py-2 px-3 text-gray-900 rounded-sm  dark:text-white dark:hover:bg-gray-700">Registrarse</x-nav-link>
                                </li>
                            @endif

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

    </header>

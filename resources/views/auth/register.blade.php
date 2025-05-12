<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="apellido_1" :value="__('Primer apellido')" />
            <x-text-input id="apellido_1" class="block mt-1 w-full" type="text" name="apellido_1" :value="old('apellido_1')" required autofocus autocomplete="apellido_1" />
            <x-input-error :messages="$errors->get('apellido_1')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="apellido_2" :value="__('Segundo apellido')" />
            <x-text-input id="apellido_2" class="block mt-1 w-full" type="text" name="apellido_2" :value="old('apellido_2')" autofocus autocomplete="apellido_2" />            
            <x-input-error :messages="$errors->get('apellido_2')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="dni" :value="__('NIF')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="dni" />            
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="fecha_nac" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fecha_nac" class="block mt-1 w-full" type="date" name="fecha_nac" :value="old('fecha_nac')" required autofocus autocomplete="fecha_nac" />            
            <x-input-error :messages="$errors->get('fecha_nac')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="telefono_contacto" :value="__('Teléfono')" />
            <x-text-input id="telefono_contacto" class="block mt-1 w-full" type="text" name="telefono_contacto" :value="old('telefono_contacto')" required autofocus autocomplete="telefono_contacto" />            
            <x-input-error :messages="$errors->get('telefono_contacto')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />            
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="localidad" :value="__('Localidad')" />
            <x-text-input id="localidad" class="block mt-1 w-full" type="text" name="localidad" :value="old('localidad')" required autofocus autocomplete="localidad" />            
            <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="provincia" :value="__('Provincia')" />
            <x-text-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" :value="old('provincia')" required autofocus autocomplete="provincia" />            
            <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="codigo_postal" :value="__('Código postal')" />
            <x-text-input id="codigo_postal" class="block mt-1 w-full" type="text" name="codigo_postal" :value="old('codigo_postal')" required autofocus autocomplete="codigo_postal" />            
            <x-input-error :messages="$errors->get('codigo_postal')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Eres miembro ya?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registro') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

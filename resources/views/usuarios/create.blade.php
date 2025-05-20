<x-dashboard-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Nuevo usuario') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre')" />
                                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                    required autofocus autocomplete="nombre" :value="old('nombre')" />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="apellido_1" :value="__('Primer apellido')" />
                                <x-text-input id="apellido_1" class="block mt-1 w-full" type="text" name="apellido_1"
                                    required autocomplete="apellido_1" :value="old('apellido_1')" />
                                <x-input-error :messages="$errors->get('apellido_1')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="apellido_2" :value="__('Segundo apellido')" />
                                <x-text-input id="apellido_2" class="block mt-1 w-full" type="text" name="apellido_2"
                                    autocomplete="apellido_2" :value="old('apellido_2')" />
                                <x-input-error :messages="$errors->get('apellido_2')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="dni" :value="__('DNI')" />
                                <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                                    required autocomplete="dni" :value="old('dni')" />
                                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="fecha_nac" :value="__('Fecha de nacimiento')" />
                                <x-text-input id="fecha_nac" class="block mt-1 w-full" type="date" name="fecha_nac"
                                    required autocomplete="fecha_nac" :value="old('fecha_nac')" />
                                <x-input-error :messages="$errors->get('fecha_nac')" class="mt-2" />
                            </div>
                            <div >
                                <x-input-label for="telefono_contacto" :value="__('Teléfono de contacto')" />
                                <x-text-input id="telefono_contacto" class="block mt-1 w-full" type="text"
                                    name="telefono_contacto" required autocomplete="telefono_contacto"
                                    :value="old('telefono_contacto')" />
                                <x-input-error :messages="$errors->get('telefono_contacto')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-2 lg:col-span-2">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    required autocomplete="email" :value="old('email')" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <x-input-label for="direccion" :value="__('Dirección')" />
                                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                                    required autocomplete="direccion" :value="old('direccion')" />
                                <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="localidad" :value="__('Localidad')" />
                                <x-text-input id="localidad" class="block mt-1 w-full" type="text" name="localidad"
                                    required autocomplete="localidad" :value="old('localidad')" />
                                <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="provincia" :value="__('Provincia')" />
                                <x-text-input id="provincia" class="block mt-1 w-full" type="text" name="provincia"
                                    required autocomplete="provincia" :value="old('provincia')" />
                                <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="codigo_postal" :value="__('Código postal')" />
                                <x-text-input id="codigo_postal" class="block mt-1 w-full sm:w-28 lg:w-28" type="text"
                                    name="codigo_postal" required autocomplete="codigo_postal" :value="old('codigo_postal')" />
                                <x-input-error :messages="$errors->get('codigo_postal')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-primary-button type="submit">
                                {{ __('Crear Usuario') }}
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
</x-dashboard-layout>

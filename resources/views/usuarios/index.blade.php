<x-dashboard-layout>
    <div x-data="{ borrarId: null, borrarNombre: '' }">
        <div class="py-12">
            <div class="w-full px-4 mt-3">
                <div class="grid grid-cols-1">
                    @yield('filtro')
                </div>

                <div class="rounded-xl shadow-md bg-white mb-4">
                    <div class="border-b px-4 py-3 font-semibold text-gray-700 bg-gray-100 rounded-t-xl">
                        {{ __('Tabla de usuarios') }}
                    </div>

                    <div class="px-4 py-4">
                        @if ($message = Session::get('success'))
                            <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-green-800 border border-green-300">
                                {{ $message }}
                            </div>
                        @endif

                        <div class="mb-3 flex justify-start">
                            <a href="{{ route('crearUsuario') }}"
                                class="inline-block rounded border border-gray-900 bg-blue-500 px-3 py-1 text-sm text-white hover:bg-green-700">
                                Añadir usuario
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <x-tabla-crud :datos="$usuarios" :cabeceras="[
                                'Nº Socio',
                                'Nombre usuario',
                                'DNI',
                                'Nombre',
                                'Primer apellido',
                                'Segundo apellido',
                                'Email',
                                'Teléfono contacto',
                                'Activo',
                            ]" :campos="[
                                'num_socio',
                                'nombre_evento',
                                'dni',
                                'nombre',
                                'apellido_1',
                                'apellido_2',
                                'email',
                                'telefono_contacto',
                                'activo',
                            ]" :rutas="[
                                'edit' => 'verUsuario',
                                'recuperar' => 'recuperarUsuario',
                            ]"
                                :parametro="'usuario'" />
                        </div>

                        <!-- Modal de confirmación usando Breeze -->
                        <x-modal name="borrar-confirmacion" :show="false">
                            <div class="p-4">
                                <h2 class="text-lg font-semibold mb-2">Confirmar borrado</h2>

                                <p class="mb-4">
                                    ¿Estás seguro de que deseas borrar el usuario
                                    <strong x-text="borrarNombre"></strong>?<br>
                                    Esta acción solo ocultará el usuario, no lo eliminará permanentemente.
                                </p>

                                <div class="flex justify-end">
                                    <button type="button"
                                        class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400"
                                        @click="window.dispatchEvent(new CustomEvent('close-modal', { detail: 'borrar-confirmacion' }))">
                                        Cancelar
                                    </button>

                                    <form method="POST" :action="'{{ url('/usuarios') }}/' + borrarId + '/borrar'"
                                        class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                            Sí, borrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>

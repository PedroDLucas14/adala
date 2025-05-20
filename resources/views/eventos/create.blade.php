<x-dashboard-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Nuevo evento') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action={{ route('eventos.store') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-6 md:grid-cols-2">
                            <div class="mt-4 col-span-2">
                                <x-input-label for="nombre_evento" :value="__('Nombre del evento')" />
                                <x-text-input id="nombre_evento" class="block mt-1 w-full" type="text"
                                    name="nombre_evento" required autofocus autocomplete="nombre_evento" :value="old('nombre_evento')" />
                                <x-input-error :messages="$errors->get('nombre_evento')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="fecha_inicio" :value="__('Fecha de inicio del evento')" />
                                <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date"
                                    name="fecha_inicio" required autofocus autocomplete="fecha_inicio" :value="old('fecha_inicio')"/>
                                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="fecha_fin" :value="__('Fecha de fin del evento')" />
                                <x-text-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin"
                                    autofocus autocomplete="fecha_fin"  :value="old('fecha_fin')"/>
                                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                            </div>

                            <div class="mt-4">

                                <x-input-label for="hora_inicio" :value="__('Hora de inicio del evento')" />
                                <x-text-input id="hora_inicio" class="block mt-1 w-full" type="time"
                                    name="hora_inicio" required autofocus autocomplete="hora_inicio" :value="old('hora_inicio')"/>
                                <x-input-error :messages="$errors->get('hora_inicio')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="hora_fin" :value="__('Hora de fin del evento')" />
                                <x-text-input id="hora_fin" class="block mt-1 w-full" type="time" name="hora_fin"
                                    autofocus autocomplete="hora_fin" :value="old('hora_fin')"/>
                                <x-input-error :messages="$errors->get('hora_fin')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="participantes_maximos" :value="__('Participantes máximos permitidos')" />
                                <x-text-input id="participantes_maximos" class="block mt-1 w-full" type="number"
                                    name="participantes_maximos" required autofocus autocomplete="participantes_maximos" :value="old('participantes_maximos')"/>
                                <x-input-error :messages="$errors->get('participantes_maximos')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="participantes_actuales" :value="__('Participantes actuales')" />
                                <x-text-input id="participantes_actuales" class="block mt-1 w-full" type="number"
                                    name="participantes_actuales" autofocus autocomplete="participantes_actuales" :value="old('participantes_actuales')"/>
                                <x-input-error :messages="$errors->get('participantes_actuales')" class="mt-2" />
                            </div>
                            <div class="mt-4 col-span-2">
                                <x-input-label for="cartel" :value="__('Cartel')" />
                                <input type="file" name="cartel" id="cartel" >
                                <x-input-error :messages="$errors->get('cartel')" class="mt-2" />
                            </div>
                            <div></div>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="descripcion" :value="__('Descripción del evento')" />
                            <x-text-area name="descripcion" id="descripcion" 
                                class="w-full" :value="old('descripcion')"/>
                            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex space-x-4">
                            <x-primary-button type="submit" class="mr-2">
                                {{ __('Crear evento') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>

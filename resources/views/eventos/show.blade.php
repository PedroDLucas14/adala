<x-dashboard-layout>
    @php
     $editMode = false;
    if (!empty($errors->all())){
        $editMode = true;
    }
    @endphp
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __($evento->nombre_evento) }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ editMode: @json($editMode) }">
            <div class="m-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action={{ route('actualizarEvento', $evento) }} method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if ($evento->cartel != null)
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Cartel del evento</label>
                                <img src="{{ asset($evento->cartelEvento->ruta) }}" alt="Cartel del evento"
                                    class="w-1/2 h-auto">
                                <input type="file" name="cartel" id="cartel" x-bind:hidden="!editMode">
                            </div>
                        @endif
                        <div class="grid grid-cols-2 gap-6 mb-6 md:grid-cols-2 ">
                            <div class="mt-4 col-span-2">
                                <x-input-label for="nombre_evento" :value="__('Nombre del evento')" />
                                <x-text-input id="nombre_evento" class="block mt-1 w-full" type="text"
                                    name="nombre_evento" :value="$evento->nombre_evento" required autofocus
                                    autocomplete="nombre_evento" x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('nombre_evento')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="fecha_inicio" :value="__('Fecha de inicio del evento')" />
                                <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date"
                                    name="fecha_inicio" :value="$evento->fecha_inicio->format('Y-m-d')" required autofocus autocomplete="fecha_inicio"
                                    x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="fecha_fin" :value="__('Fecha de fin del evento')" />
                                <x-text-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin"
                                    :value="$evento->fecha_fin == null ? '' : $evento->fecha_fin->format('Y-m-d')" autofocus autocomplete="fecha_fin" x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                            </div>

                            <div class="mt-4">

                                <x-input-label for="hora_inicio" :value="__('Hora de inicio del evento')" />
                                <x-text-input id="hora_inicio" class="block mt-1 w-full" type="time"
                                    name="hora_inicio" :value="$evento->hora_inicio->format('H:i:s')" required autofocus autocomplete="hora_inicio"
                                    x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('hora_inicio')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="hora_fin" :value="__('Hora de fin del evento')" />
                                <x-text-input id="hora_fin" class="block mt-1 w-full" type="time" name="hora_fin"
                                    :value="$evento->hora_fin == null ? '' : $evento->hora_fin->format('H:i:s')" autofocus autocomplete="hora_fin" x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('hora_fin')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="participantes_maximos" :value="__('Participantes máximos permitidos')" />
                                <x-text-input id="participantes_maximos" class="block mt-1 w-full" type="number"
                                    name="participantes_maximos" :value="(!$editMode?$evento->participantes_maximos:old('participantes_maximos'))" required autofocus
                                    autocomplete="participantes_maximos" x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('participantes_maximos')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="participantes_actuales" :value="__('Participantes actuales')" />
                                <x-text-input id="participantes_actuales" class="block mt-1 w-full" type="number"
                                    x-bind:disabled="!editMode" name="participantes_actuales" :value="$evento->participantes_actuales" autofocus
                                    autocomplete="participantes_actuales" />
                                <x-input-error :messages="$errors->get('participantes_actuales')" class="mt-2" />
                            </div>
                            <div class="mt-4 col-span-2">
                                <x-input-label for="descripcion" :value="__('Descripción del evento')" />
                                <x-text-area class="w-full" name="descripcion" id="descripcion"
                                    :value="$evento->descripcion" x-bind:disabled="!editMode" />
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-4">
                            <x-primary-button type="button" x-show="!editMode" x-on:click="editMode = true">
                                {{ __('Editar Evento') }}
                            </x-primary-button>

                            <x-primary-button type="submit" x-show="editMode" class="mr-2">
                                {{ __('Actualizar datos') }}
                            </x-primary-button>

                            <x-secondary-button type="button" x-show="editMode" x-on:click="editMode = false ;location.reload()">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>

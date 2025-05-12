<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-900 border-b border-gray-200">
                    <form method="POST" action="{{ route('eventos.store') }}">
                        @csrf
                        <!-- Nombre del evento -->
                        <div>
                            <x-input-label for="nombre_evento" :value="__('Nombre del evento')" />
                            <x-text-input id="nombre_evento" class="block mt-1 w-full" type="text"
                                name="nombre_evento" :value="old('nombre_evento')" required autofocus
                                autocomplete="nombre_evento" />
                            <x-input-error :messages="$errors->get('nombre_evento')" class="mt-2" />
                        </div>
                        <!-- Descripción -->
                        <div class="mt-4">
                            <x-input-label for="descripcion" :value="__('Descripción')" />
                            <textarea id="descripcion" class="block mt-1 w-full" name="descripcion" required>{{ old('descripcion') }}</textarea>
                            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                        </div>
                        <!-- Fecha de inicio -->
                        <div class="mt-4">
                            <x-input-label for="fecha_inicio" :value="__('Fecha de inicio')" />
                            <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio"
                                :value="old('fecha_inicio')" required autofocus autocomplete="fecha_inicio" />
                            <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="hora_inicio" :value="__('Hora de inicio')" />
                            <x-text-input id="hora_inicio" class="block mt-1 w-full" type="time" name="hora_inicio"
                                :value="old('hora_inicio')" required autofocus autocomplete="hora_inicio" />
                            <x-input-error :messages="$errors->get('hora_inicio')" class="mt-2" />
                        </div>
                        <!-- Fecha de fin -->
                        <div class="mt-4">
                            <x-input-label for="fecha_fin" :value="__('Fecha de fin')" />
                            <x-text-input id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin"
                                :value="old('fecha_fin')" autofocus autocomplete="fecha_fin" />
                            <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="hora_fin" :value="__('Hora de fin')" />
                            <x-text-input id="hora_fin" class="block mt-1 w-full" type="time" name="hora_fin"
                                :value="old('hora_fin')" autofocus autocomplete="hora_fin" />
                            <x-input-error :messages="$errors->get('hora_fin')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for='participantes_maximos' :value="__('Número de participantes')" />
                            <x-text-input id="participantes_maximos" class="block mt-1 w-full" type="number"
                                name="participantes_maximos" :value="old('participantes_maximos')" required autofocus
                                autocomplete="participantes_maximos" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for='participantes_actuales' :value="__('Número de participantes actuales')" />
                            <x-text-input id="participantes_actuales" class="block mt-1 w-full" type="number"
                                name="participantes_actuales" :value="old('participantes_actuales')" autofocus
                                autocomplete="participantes_actuales" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for='cartel' :value="__('Cartel')" />
                            <x-text-input id="cartel" class="block mt-1 w-full" type="file" name="cartel"
                                :value="old('cartel')" autofocus autocomplete="cartel" />
                            <x-input-error :messages="$errors->get('cartel')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Crear evento') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</x-app-layout>

<table class="min-w-full table-auto border border-gray-900">
    <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
        <tr>
            @foreach ($cabeceras as $cabecera)
                <th class="border px-4 py-2 text-center">{{ $cabecera }}</th>
            @endforeach
            <th class="border px-4 py-2 text-center">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-sm text-gray-800">
        @foreach ($datos as $dato)
            <tr>
                @foreach ($campos as $campo)
                    <td class="border px-4 py-2 text-center">
                        @php
                            $value = data_get($dato, $campo);

                            // Formatear fechas (si es instancia de Carbon)
                            if ($value instanceof \Carbon\Carbon) {
                                $value = $value->format('d/m/Y');
                            }

                            // Mostrar "Sí"/"No" para booleanos
                            elseif (is_bool($value)) {
                                $value = $value ? 'Sí' : 'No';
                            }

                            // Opcional: mostrar "-" si es null
                            elseif (is_null($value)) {
                                $value = '-';
                            }
                        @endphp

                        {{ $value }}
                    </td>
                @endforeach

                {{-- Acciones --}}
                <td class="border px-4 py-2">
                    <div class="flex justify-evenly">
                      <a href="{{ route($rutas['edit'], [$parametro => $dato->id]) }}"
                            class="inline-block rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                            Ver / Modificar
                        </a>

                        @if (Auth::check() && Auth::user()->isAdmin())
                            @if (!$dato->activo)
                                <form method="POST"
                                    action="{{ route($rutas['recuperar'], [$parametro => $dato->id]) }}">
                                    @csrf
                                    <input type="submit"
                                        class="cursor-pointer rounded bg-green-600 px-3 py-1 text-sm text-white hover:bg-green-700"
                                        value="Recuperar">
                                </form>
                            @else
                                <button type="button"
                                    @click="
                                        borrarId = {{ $dato->id }};
                                        borrarNombre = @js($dato->nombre_evento ?? 'Sin nombre');
                                        window.dispatchEvent(new CustomEvent('open-modal', { detail: 'borrar-confirmacion' }))
                                    "
                                    class="cursor-pointer rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                                    Borrar
                                </button>
                            @endif
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

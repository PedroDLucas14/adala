<x-guest-layout>
    <section class="bg-white py-16 px-6 sm:px-12 lg:px-32">
        <div class="text-center mb-14 max-w-4xl mx-auto">
            <h1 class="text-5xl font-extrabold text-blue-800 mb-4">ADALA</h1>
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-2">Con talento, con pasión</h2>
            <h3 class="text-xl sm:text-2xl font-medium text-blue-600 mb-6">Contigo en cada paso</h3>

            <p class="text-lg text-gray-700 mb-4">
                Somos una asociación que lucha y trabaja por un futuro más
                <span class="font-semibold text-blue-600">inclusivo</span>.
                Apostamos por un equipo multidisciplinar formado por
                <span class="font-semibold">Psicología, Maestra PT, Logopeda y Trabajadora Social</span>.
            </p>

            <p class="text-gray-700 mb-4">
                Nuestro equipo cuenta con amplia experiencia en atención a personas con diversidad funcional y el
                compromiso de brindar una enseñanza equitativa y de calidad.
            </p>

            <p class="text-gray-700">
                Para nosotr@s es sumamente importante el bienestar y la calidad de vida de nuestros usuari@s. Por ello,
                trabajamos de forma <span class="font-medium text-blue-600">individual y específica</span> con cada
                persona, sus familiares y servicios externos (centros educativos, CAIT, servicios sociales...).
            </p>
        </div>

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Nuestros Servicios</h2>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (['Psicología', 'Logopeda', 'Pedagogía Terapéutica', 'Trabajo Social', 'Fisioterapia', 'Chi Kung', 'Ocio'] as $servicio)
                <div class="bg-blue-50 p-6 rounded-xl shadow-sm hover:shadow-lg transition duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-white rounded-full flex items-center justify-center text-blue-600 text-xl shadow">
                        <!-- Aquí puedes poner un ícono o una imagen -->
                        <span class="font-bold">🧩</span>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-800">{{ $servicio }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <x-slot name="footer">
        <div class="text-center py-4">
            <p>&copy; 2023 ADALA. Todos los derechos reservados.</p>
        </div>
    </x-slot>
</x-guest-layout>

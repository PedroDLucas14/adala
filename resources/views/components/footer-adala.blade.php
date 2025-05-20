@props(['mapa' => false])
<footer class="bg-gray-300 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-8">
        <div class="grid grid-cols-2 md:grid-cols-2 gap-8 items-start p-4">
            <!-- Columna izquierda: Contacto -->
            <div class="md:order-1">
                <h4 class="text-xl font-semibold mb-2">Contacto</h4>
                <h5 class="font-medium">Dirección</h5>
                <p class="mb-4">Calle Retamar, 3, Alameda (Málaga)</p>
                <h5 class="font-medium">Teléfono</h5>
                <p>951 19 94 80</p>
            </div>
            @if ($mapa)
                <!-- Columna derecha: Mapa -->
                <div class="md:order-2 flex justify-center md:justify-end">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3177.642028097947!2d-4.657276288432974!3d37.208731144448016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d61fcd79691d1%3A0x280cb8ea827a84d4!2sC.%20Retamar%2C%203%2C%2029530%20Alameda%2C%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1747051826415!5m2!1ses!2ses"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-lg w-full max-w-md">
                    </iframe>
                </div>
            @endif
        </div>
    </div>
</footer>

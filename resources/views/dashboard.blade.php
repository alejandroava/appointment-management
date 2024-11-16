<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <!-- Barra de navegación -->
            <nav class="space-x-4">
                <a href="#inicio" class="text-gray-700 hover:text-blue-500">INICIO</a>
                <a href="/appointments/create" class="text-gray-700 hover:text-blue-500">AGENDAR CITA</a>
                <a href="/appointments" class="text-gray-700 hover:text-blue-500">VER MIS CITAS</a>
            </nav>
        </div>
    </x-slot>

    <!-- Definir la sección de contenido -->
    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <!-- Sección Contenido para tu bienestar -->
                <section id="bienestar" class="my-12 px-4">
                    <h3 class="text-2xl font-bold text-gray-800 text-center">Contenido para tu Bienestar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Consulta médica" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-xl font-semibold text-blue-600">Consulta Médica General</h4>
                            <p class="text-gray-600 mt-2">Accede a consultas generales con médicos especializados. Tu salud es nuestra prioridad.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Tratamientos especializados" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-xl font-semibold text-blue-600">Tratamientos Especializados</h4>
                            <p class="text-gray-600 mt-2">Recibe atención médica especializada con los mejores profesionales en diversas áreas de la medicina.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Salud preventiva" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-xl font-semibold text-blue-600">Salud Preventiva</h4>
                            <p class="text-gray-600 mt-2">Realiza chequeos preventivos para mantenerte saludable y prevenir futuras complicaciones.</p>
                        </div>
                    </div>
                </section>

                <!-- Sección Últimas Novedades -->
                <section id="novedades" class="my-12 px-4">
                    <h3 class="text-2xl font-bold text-gray-800 text-center">Últimas Novedades</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Novedad 1" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-blue-600">Nuevo Servicio de Telemedicina</h4>
                            <p class="text-gray-600 mt-2">Ahora puedes acceder a consultas médicas a través de nuestra plataforma de telemedicina.</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Novedad 2" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-blue-600">Campaña de Vacunación</h4>
                            <p class="text-gray-600 mt-2">Te invitamos a participar en nuestra campaña de vacunación gratuita para adultos y niños.</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="https://via.placeholder.com/400x300" alt="Novedad 3" class="w-full h-40 object-cover rounded-lg mb-4">
                            <h4 class="text-lg font-semibold text-blue-600">Nuevas Especialidades Médicas</h4>
                            <p class="text-gray-600 mt-2">Se han incorporado nuevas especialidades médicas en nuestra clínica para brindar más opciones a nuestros pacientes.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="w-1/2">
                    <h5 class="text-lg font-semibold">Sobre Nosotros</h5>
                    <p class="text-gray-300 mt-2">Somos una institución médica comprometida con tu salud, brindando servicios médicos de calidad y atención personalizada.</p>
                </div>
                <div class="w-1/2">
                    <h5 class="text-lg font-semibold">Líneas de Atención</h5>
                    <ul class="text-gray-300 mt-2">
                        <li>+123 456 7890</li>
                        <li>contacto@clinica.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @endsection
</x-app-layout>

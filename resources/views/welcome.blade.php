<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Inmobiliaria | Gestión Inteligente</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Navegación -->
    <nav class="bg-white shadow-sm fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <svg class="h-8 w-8 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span class="font-bold text-xl text-gray-900">InmoSys</span>
                </div>
                <div class="flex items-center">
                    <form method="POST">
                        <a href="{{ route('alquileres') }}" class="text-gray-600 hover:text-indigo-600 font-semibold px-4">Iniciar Sesión</a>
                        <a href="/register" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-semibold transition duration-300">Registrarse</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-indigo-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-6">
                Gestión integral para tu <span class="text-indigo-600">inmobiliaria</span>
            </h1>
            <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                Administra propiedades, automatiza contratos y genera liquidaciones de forma precisa desde un solo lugar. Todo el control, sin complicaciones.
            </p>
 
    </section>

    <!-- Características (Módulos del UML) -->
    <section id="caracteristicas" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Módulos principales del sistema</h2>
                <p class="mt-4 text-lg text-gray-500">Diseñado a medida para cubrir todo el ciclo de vida del alquiler.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Personas -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Propietarios e Inquilinos</h3>
                    <p class="text-gray-600 text-sm">Gestiona perfiles completos, cuentas bancarias y documentación respaldatoria de todas las personas involucradas.</p>
                </div>

                <!-- Inmuebles -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Inmuebles y Amenities</h3>
                    <p class="text-gray-600 text-sm">Catálogo detallado de propiedades con control total sobre comodidades (quincho, piscina, vigilancia) y distribución espacial.</p>
                </div>

                <!-- Contratos -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Contratos Dinámicos</h3>
                    <p class="text-gray-600 text-sm">Crea acuerdos vinculando múltiples inquilinos y garantes. Controla duraciones, índices y periodos de actualización automática.</p>
                </div>

                <!-- Liquidaciones -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Liquidaciones y Pagos</h3>
                    <p class="text-gray-600 text-sm">Cálculo exacto de alquileres y expensas. Seguimiento de fechas de pago de inquilinos y rendición a propietarios.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span class="text-white font-bold text-xl">InmoSys</span>
                <p class="text-sm mt-2">Sistema de Gestión Inmobiliaria Basado en Laravel</p>
            </div>
            <div class="flex space-x-6 text-sm">
                <a href="#" class="hover:text-white transition">Soporte</a>
                <a href="#" class="hover:text-white transition">Términos</a>
                <a href="#" class="hover:text-white transition">Privacidad</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-8 border-t border-gray-800 text-sm text-center">
            &copy; 2026 InmoSys. Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>
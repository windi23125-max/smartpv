<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol Alat - SmartPV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
            <div class="p-6 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">PV</div>
                <h1 class="text-xl font-bold tracking-tight">SmartPV</h1>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
    <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 {{ Request::is('/') ? 'bg-blue-50 text-blue-600' : 'text-gray-500' }} rounded-xl font-medium transition">
        <i class="ph ph-squares-four text-xl"></i> Dashboard
    </a>
    
    <a href="{{ url('/monitoring') }}" class="flex items-center gap-3 px-4 py-3 {{ Request::is('monitoring') ? 'bg-blue-50 text-blue-600' : 'text-gray-500' }} rounded-xl font-medium transition">
        <i class="ph ph-chart-line-up text-xl"></i> Monitoring Data
    </a>

    <a href="{{ url('/kontrol') }}" class="flex items-center gap-3 px-4 py-3 {{ Request::is('kontrol') ? 'bg-blue-50 text-blue-600' : 'text-gray-500' }} rounded-xl font-medium transition">
        <i class="ph ph-faders text-xl"></i> Kontrol Alat
    </a>

    <a href="{{ url('/pembersih') }}" class="flex items-center gap-3 px-4 py-3 {{ Request::is('pembersih') ? 'bg-blue-50 text-blue-600' : 'text-gray-500' }} rounded-xl font-medium transition">
        <i class="ph ph-drop text-xl"></i> Sistem Pembersih
    </a>

    <a href="{{ url('/analisis') }}" class="flex items-center gap-3 px-4 py-3 {{ Request::is('analisis') ? 'bg-blue-50 text-blue-600' : 'text-gray-500' }} rounded-xl font-medium transition">
        <i class="ph ph-trend-up text-xl"></i> Analisis
    </a>
</nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <header class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Kontrol Perangkat</h2>
                <p class="text-gray-500 text-sm">Kendali jarak jauh pompa dan sistem</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @foreach($devices as $device)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between h-48 relative overflow-hidden group">
                    
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full group-hover:bg-blue-100 transition"></div>

                    <div>
                        <div class="p-3 w-12 h-12 rounded-xl flex items-center justify-center mb-4 transition-colors
                            {{ $device->status ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-500' }}" 
                            id="icon-{{ $device->id }}">
                            <i class="ph {{ $device->name == 'Pompa Pembersih' ? 'ph-drop' : 'ph-gear' }} text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $device->name }}</h3>
                        <p class="text-sm text-gray-400" id="status-text-{{ $device->id }}">
                            {{ $device->status ? 'Sedang Aktif' : 'Non-Aktif' }}
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm font-medium text-gray-500">Power Switch</span>
                        
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" 
                                onchange="toggleDevice({{ $device->id }})" 
                                {{ $device->status ? 'checked' : '' }}>
                            
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
                @endforeach

            </div>
        </main>
    </div>

    <script>
        function toggleDevice(id) {
            fetch(`/kontrol/toggle/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Update tampilan teks dan warna icon secara real-time
                const statusText = document.getElementById(`status-text-${id}`);
                const iconBox = document.getElementById(`icon-${id}`);

                if (data.new_state) {
                    statusText.innerText = "Sedang Aktif";
                    iconBox.className = "p-3 w-12 h-12 rounded-xl flex items-center justify-center mb-4 transition-colors bg-green-100 text-green-600";
                } else {
                    statusText.innerText = "Non-Aktif";
                    iconBox.className = "p-3 w-12 h-12 rounded-xl flex items-center justify-center mb-4 transition-colors bg-gray-100 text-gray-500";
                }
            })
            .catch(error => alert('Gagal mengubah status!'));
        }
    </script>

</body>
</html>
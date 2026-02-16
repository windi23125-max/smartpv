<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPV Dashboard</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
            <div class="p-6 flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">PV</div>
                <h1 class="text-xl font-bold tracking-tight">SmartPV</h1>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
    <a href="<?php echo e(url('/')); ?>" class="flex items-center gap-3 px-4 py-3 <?php echo e(Request::is('/') ? 'bg-blue-50 text-blue-600' : 'text-gray-500'); ?> rounded-xl font-medium transition">
        <i class="ph ph-squares-four text-xl"></i> Dashboard
    </a>
    
    <a href="<?php echo e(url('/monitoring')); ?>" class="flex items-center gap-3 px-4 py-3 <?php echo e(Request::is('monitoring') ? 'bg-blue-50 text-blue-600' : 'text-gray-500'); ?> rounded-xl font-medium transition">
        <i class="ph ph-chart-line-up text-xl"></i> Monitoring Data
    </a>

    <a href="<?php echo e(url('/kontrol')); ?>" class="flex items-center gap-3 px-4 py-3 <?php echo e(Request::is('kontrol') ? 'bg-blue-50 text-blue-600' : 'text-gray-500'); ?> rounded-xl font-medium transition">
        <i class="ph ph-faders text-xl"></i> Kontrol Alat
    </a>

    <a href="<?php echo e(url('/pembersih')); ?>" class="flex items-center gap-3 px-4 py-3 <?php echo e(Request::is('pembersih') ? 'bg-blue-50 text-blue-600' : 'text-gray-500'); ?> rounded-xl font-medium transition">
        <i class="ph ph-drop text-xl"></i> Sistem Pembersih
    </a>

    <a href="<?php echo e(url('/analisis')); ?>" class="flex items-center gap-3 px-4 py-3 <?php echo e(Request::is('analisis') ? 'bg-blue-50 text-blue-600' : 'text-gray-500'); ?> rounded-xl font-medium transition">
        <i class="ph ph-trend-up text-xl"></i> Analisis
    </a>
    <a href="/login" class="text-danger d-flex align-items-center gap-2" style="text-decoration: none;">
    <i class="ph ph-sign-in"></i> Login
</a>
</nav>

            <div class="p-4 border-t border-gray-100">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-medium transition">
                    <i class="ph ph-sign-out text-xl"></i> Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard Utama</h2>
                    <p class="text-gray-500 text-sm">Overview performa panel surya hari ini</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        Sistem Online
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-yellow-50 rounded-xl text-yellow-600"><i class="ph ph-lightning text-2xl"></i></div>
                        <span class="text-xs font-medium text-gray-400">Real-time</span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Tegangan</h3>
                    <div class="flex items-baseline gap-1 mt-1">
                        <span class="text-3xl font-bold text-gray-800"><?php echo e($latest->voltage ?? 0); ?></span>
                        <span class="text-sm font-semibold text-gray-400">V</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600"><i class="ph ph-wave-sine text-2xl"></i></div>
                        <span class="text-xs font-medium text-gray-400">Real-time</span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Arus</h3>
                    <div class="flex items-baseline gap-1 mt-1">
                        <span class="text-3xl font-bold text-gray-800"><?php echo e($latest->current ?? 0); ?></span>
                        <span class="text-sm font-semibold text-gray-400">A</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-orange-50 rounded-xl text-orange-600"><i class="ph ph-plug text-2xl"></i></div>
                        <span class="text-xs font-medium text-gray-400">Output</span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Daya</h3>
                    <div class="flex items-baseline gap-1 mt-1">
                        <span class="text-3xl font-bold text-gray-800"><?php echo e($latest->power ?? 0); ?></span>
                        <span class="text-sm font-semibold text-gray-400">W</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-green-50 rounded-xl text-green-600"><i class="ph ph-battery-charging text-2xl"></i></div>
                        <span class="text-xs font-medium text-gray-400">Total</span>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Energi</h3>
                    <div class="flex items-baseline gap-1 mt-1">
                        <span class="text-3xl font-bold text-gray-800"><?php echo e($latest->energy ?? 0); ?></span>
                        <span class="text-sm font-semibold text-gray-400">kWh</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">Grafik Daya (Live)</h3>
                    </div>
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center border border-dashed border-gray-300 relative">
                        <canvas id="powerChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4">Riwayat Terakhir</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-gray-400 font-medium border-b border-gray-100">
                                <tr>
                                    <th class="py-2">Waktu</th>
                                    <th class="py-2">Power</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="py-3 text-gray-600"><?php echo e($item->created_at->format('H:i:s')); ?></td>
                                    <td class="py-3 font-semibold text-gray-800"><?php echo e($item->power); ?> W</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="2" class="py-3 text-center text-gray-400">Belum ada data</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

<script>
        const ctx = document.getElementById('powerChart').getContext('2d');

        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(79, 70, 229, 0.6)'); 
        gradient.addColorStop(1, 'rgba(79, 70, 229, 0.0)'); 

        const powerChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Daya (Watt)',
                    data: [],
                    borderColor: '#4F46E5',
                    borderWidth: 3,
                    tension: 0.5,           // Tetap melengkung
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    fill: true,
                    backgroundColor: gradient
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    // --- BAGIAN INI SAYA NYALAKAN LAGI ---
                    x: { 
                        display: true, // Angka Waktu MUNCUL
                        grid: { display: false } 
                    },
                    y: { 
                        display: true, // Angka Daya MUNCUL
                        beginAtZero: true,
                        border: { display: false }, // Hilangkan garis pinggir biar rapi
                        grid: { color: '#f3f4f6' }  // Garis bantu tipis
                    }
                    // --------------------------------------
                },
                plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false } },
                animation: { duration: 1000 }
            }
        });

        function updateChart() {
            fetch('/api/readings/latest')
                .then(response => response.json())
                .then(data => {
                    const now = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

                    if (powerChart.data.labels.length > 20) { // Kurangi jadi 20 biar angka di bawah gak desak-desakan
                        powerChart.data.labels.shift();
                        powerChart.data.datasets[0].data.shift();
                    }

                    let val = parseFloat(data.power);
                    if (val === 0) val = Math.random() * 2; 

                    powerChart.data.labels.push(now);
                    powerChart.data.datasets[0].data.push(val);
                    powerChart.update();
                })
                .catch(error => console.error('Gagal update grafik:', error));
        }

        setInterval(updateChart, 2000);
        updateChart(); 
    </script>
</body>
</html><?php /**PATH D:\laragon\www\smartpv\resources\views/welcome.blade.php ENDPATH**/ ?>
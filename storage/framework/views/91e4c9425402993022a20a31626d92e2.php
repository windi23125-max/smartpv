<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Analisis Efisiensi</title>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
        <div class="p-6 flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">PV</div>
            <h1 class="text-xl font-bold tracking-tight">SmartPV</h1>
        </div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="<?php echo e(url('/')); ?>" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl font-medium transition">
                <i class="ph ph-squares-four text-xl"></i> Dashboard
            </a>
            <a href="<?php echo e(url('/monitoring')); ?>" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl font-medium transition">
                <i class="ph ph-chart-line-up text-xl"></i> Monitoring Data
            </a>
            <a href="<?php echo e(url('/kontrol')); ?>" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl font-medium transition">
                <i class="ph ph-faders text-xl"></i> Kontrol Alat
            </a>
            <a href="<?php echo e(url('/pembersih')); ?>" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl font-medium transition">
                <i class="ph ph-drop text-xl"></i> Sistem Pembersih
            </a>
            <a href="<?php echo e(url('/analisis')); ?>" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-medium transition">
                <i class="ph ph-trend-up text-xl"></i> Analisis
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6">📊 Analisis Performa</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center">
                <h3 class="font-bold text-gray-700 mb-6 text-center">Efisiensi Saat Ini</h3>
                <div class="relative w-full h-64">
                    <canvas id="efficiencyChart"></canvas>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-3xl font-bold text-indigo-600"><?php echo e(number_format($efficiency, 1)); ?>%</span>
                        <span class="text-xs text-gray-400 uppercase">Health Score</span>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-700 mb-6 uppercase text-sm tracking-wider">Detail Penurunan Daya</h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-end border-b pb-4">
                        <span class="text-gray-500">Target Daya Maksimal (STC)</span>
                        <span class="font-bold text-xl"><?php echo e($maxPower); ?> W</span>
                    </div>
                    <div class="flex justify-between items-end border-b pb-4">
                        <span class="text-gray-500 text-indigo-600">Daya Terukur Saat Ini</span>
                        <span class="font-bold text-xl text-indigo-600"><?php echo e($currentPower); ?> W</span>
                    </div>
                    <div class="flex justify-between items-end border-b pb-4 text-red-500">
                        <span class="italic text-sm">Kerugian akibat debu & panas</span>
                        <span class="font-bold text-xl">-<?php echo e(number_format($maxPower - $currentPower, 2)); ?> W</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        new Chart(document.getElementById('efficiencyChart'), {
            type: 'doughnut',
            data: {
                labels: ['Efisien', 'Loss'],
                datasets: [{
                    data: [<?php echo e($efficiency); ?>, <?php echo e($loss); ?>],
                    backgroundColor: ['#4F46E5', '#FEE2E2'],
                    borderWidth: 0
                }]
            },
            options: { cutout: '80%', plugins: { legend: { display: false } } }
        });
    </script>
</body>
</html><?php /**PATH D:\laragon\www\smartpv\resources\views/analisis.blade.php ENDPATH**/ ?>
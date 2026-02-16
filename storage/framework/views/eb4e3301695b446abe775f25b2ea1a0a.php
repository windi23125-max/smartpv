<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Data - SmartPV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
</nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Data Monitoring</h2>
                    <p class="text-gray-500 text-sm">Rekap data sensor lengkap & history</p>
                </div>
                
                <a href="<?php echo e(route('monitoring.export')); ?>" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm">
    <i class="ph ph-file-csv text-lg"></i>
                    Export CSV
                </a>
            </header>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="p-4 text-sm font-semibold text-gray-500">Waktu</th>
                            <th class="p-4 text-sm font-semibold text-gray-500">Tegangan (V)</th>
                            <th class="p-4 text-sm font-semibold text-gray-500">Arus (A)</th>
                            <th class="p-4 text-sm font-semibold text-gray-500">Daya (W)</th>
                            <th class="p-4 text-sm font-semibold text-gray-500">Energi (kWh)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__currentLoopData = $readings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-600 text-sm">
                                <?php echo e($reading->created_at->format('d M Y, H:i:s')); ?>

                            </td>
                            <td class="p-4 font-medium text-gray-800"><?php echo e($reading->voltage); ?> V</td>
                            <td class="p-4 font-medium text-gray-800"><?php echo e($reading->current); ?> A</td>
                            <td class="p-4 font-medium text-gray-800"><?php echo e($reading->power); ?> W</td>
                            <td class="p-4 font-medium text-gray-800"><?php echo e($reading->energy); ?> kWh</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
                <div class="p-4 border-t border-gray-100">
                    <?php echo e($readings->links()); ?>

                </div>
            </div>
        </main>
    </div>

</body>
</html><?php /**PATH D:\laragon\www\smartpv\resources\views/monitoring.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Sistem Pembersih</title>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
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
            <a href="<?php echo e(url('/pembersih')); ?>" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-medium transition">
                <i class="ph ph-drop text-xl"></i> Sistem Pembersih
            </a>
            <a href="<?php echo e(url('/analisis')); ?>" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:bg-gray-100 rounded-xl font-medium transition">
                <i class="ph ph-trend-up text-xl"></i> Analisis
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">🚰 Sistem Pembersih</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="p-4 <?php echo e($pompa->status ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-400'); ?> rounded-2xl transition">
                        <i class="ph ph-drop-half-bottom text-3xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Status Pompa Air</h3>
                        <p class="text-sm <?php echo e($pompa->status ? 'text-blue-500 font-semibold' : 'text-gray-400'); ?>">
                            <?php echo e($pompa->status ? 'Sedang Menyemprot...' : 'Siaga (Standby)'); ?>

                        </p>
                    </div>
                </div>
                <div class="w-full bg-gray-100 h-3 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-500 transition-all duration-1000 <?php echo e($pompa->status ? 'w-full animate-pulse' : 'w-0'); ?>"></div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-center">
                <h3 class="text-gray-400 text-sm font-medium mb-2 uppercase tracking-wider">Terakhir Dibersihkan</h3>
                <p class="text-3xl font-bold text-gray-800"><?php echo e($pompa->updated_at->diffForHumans()); ?></p>
                <p class="text-gray-400 text-sm mt-1"><?php echo e($pompa->updated_at->format('d M Y, H:i')); ?> WIB</p>
            </div>
        </div>
    </main>
</body>
</html><?php /**PATH D:\laragon\www\smartpv\resources\views/pembersih.blade.php ENDPATH**/ ?>
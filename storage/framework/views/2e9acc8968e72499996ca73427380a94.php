<?php $__env->startSection('title', 'Detail Laporan'); ?>
<?php $__env->startSection('content'); ?>
<h2>Detail Laporan Banjir</h2>
<?php if(session('success')): ?> <div class="alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
<div class="card">
    <p><strong>Nama Pelapor:</strong> <?php echo e($laporan->nama_pelapor); ?></p>
    <p><strong>Nomor HP:</strong> <?php echo e($laporan->no_hp); ?></p>
    <p><strong>Lokasi:</strong> <?php echo e($laporan->lokasi); ?></p>
    <p><strong>Kecamatan:</strong> <?php echo e($laporan->kecamatan); ?></p>
    <p><strong>Tinggi Air:</strong> <?php echo e($laporan->tinggi_air); ?> cm</p>
    <p><strong>Keterangan:</strong> <?php echo e($laporan->keterangan ?: '-'); ?></p>
    <p><strong>Status:</strong> <?php echo e($laporan->status); ?></p>
    <?php if($laporan->foto): ?>
        <p><strong>Foto Bukti:</strong></p>
        <img src="<?php echo e(asset('storage/'.$laporan->foto)); ?>" alt="Foto bukti banjir" style="max-width:100%;width:400px;border-radius:8px;">
    <?php endif; ?>
</div>
<a class="btn" href="<?php echo e(route('petugas.laporan.edit', $laporan)); ?>">Edit Laporan</a>
<a class="btn btn-secondary" href="<?php echo e(route('petugas.laporan.index')); ?>">Kembali</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ahmad Miqdad\Downloads\LaporBanjir_sesuai_soal\LaporBanjir2\resources\views/lapor-banjir/show.blade.php ENDPATH**/ ?>
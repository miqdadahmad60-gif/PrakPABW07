<?php $__env->startSection('title', 'Daftar Laporan Banjir'); ?>
<?php $__env->startSection('content'); ?>
<h2>Daftar Laporan Banjir</h2>
<p>Kelola laporan banjir yang dikirim oleh masyarakat.</p>

<?php if(session('success')): ?> <div class="alert-success"><?php echo e(session('success')); ?></div> <?php endif; ?>
<a class="btn" href="<?php echo e(route('petugas.laporan.create')); ?>">+ Tambah Laporan</a>

<div style="overflow-x:auto; margin-top:18px;">
<table>
    <thead><tr><th>Foto</th><th>Pelapor</th><th>Lokasi</th><th>Kecamatan</th><th>Tinggi Air</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $laporans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td>
                <?php if($laporan->foto): ?>
                    <img src="<?php echo e(asset('storage/'.$laporan->foto)); ?>" alt="Foto banjir" style="width:85px;height:65px;object-fit:cover;border-radius:5px;">
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td><?php echo e($laporan->nama_pelapor); ?></td>
            <td><?php echo e($laporan->lokasi); ?></td>
            <td><?php echo e($laporan->kecamatan); ?></td>
            <td><?php echo e($laporan->tinggi_air); ?> cm</td>
            <td><span class="badge"><?php echo e($laporan->status); ?></span></td>
            <td class="actions">
                <a class="btn" href="<?php echo e(route('petugas.laporan.show', $laporan)); ?>">Detail</a>
                <a class="btn btn-warning" href="<?php echo e(route('petugas.laporan.edit', $laporan)); ?>">Edit</a>
                <form action="<?php echo e(route('petugas.laporan.destroy', $laporan)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="7">Belum ada laporan banjir.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div>
<?php echo e($laporans->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ahmad Miqdad\Downloads\LaporBanjir_sesuai_soal\LaporBanjir2\resources\views/lapor-banjir/index.blade.php ENDPATH**/ ?>
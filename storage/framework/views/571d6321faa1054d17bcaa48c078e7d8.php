<?php $__env->startSection('title', 'Profil Petugas'); ?>
<?php $__env->startSection('content'); ?>
<h2>Profil Petugas BPBD</h2>
<div class="card">
    <p><strong>Nama:</strong> <?php echo e(Auth::user()->name); ?></p>
    <p><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></p>
    <p><strong>Akun dibuat:</strong> <?php echo e(Auth::user()->created_at); ?></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ahmad Miqdad\Downloads\LaporBanjir_sesuai_soal\LaporBanjir2\resources\views/auth/profile.blade.php ENDPATH**/ ?>
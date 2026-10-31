<?php $__env->startSection('title', 'Form Lapor Banjir'); ?>

<?php $__env->startSection('content'); ?>
<h2>Formulir Pelaporan Banjir</h2>
<p>Isi informasi kejadian banjir dan sertakan foto sebagai bukti.</p>

<?php if(session('success')): ?>
    <div class="alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="alert-error"><ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
<?php endif; ?>

<form action="<?php echo e(route('lapor.kirim')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label>Nama Pelapor</label>
    <input type="text" name="nama_pelapor" value="<?php echo e(old('nama_pelapor')); ?>" required>

    <label>Nomor HP</label>
    <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" required>

    <label>Lokasi Kejadian</label>
    <input type="text" name="lokasi" value="<?php echo e(old('lokasi')); ?>" placeholder="Nama jalan / desa / patokan" required>

    <label>Kecamatan</label>
    <input type="text" name="kecamatan" value="<?php echo e(old('kecamatan')); ?>" required>

    <label>Tinggi Air (cm)</label>
    <input type="number" name="tinggi_air" min="0" value="<?php echo e(old('tinggi_air')); ?>" required>

    <label>Keterangan</label>
    <textarea name="keterangan" rows="4"><?php echo e(old('keterangan')); ?></textarea>

    <label>Foto Bukti (JPG/PNG, maksimal 2 MB)</label>
    <input type="file" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png" required>

    <button type="submit">Kirim Laporan</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ahmad Miqdad\Downloads\LaporBanjir_sesuai_soal\LaporBanjir2\resources\views/lapor-banjir/form.blade.php ENDPATH**/ ?>
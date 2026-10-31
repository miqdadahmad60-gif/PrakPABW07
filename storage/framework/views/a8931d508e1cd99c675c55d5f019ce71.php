

<?php $__env->startSection('content'); ?>
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h2>Login Petugas BPBD</h2>

    <!-- Menampilkan pesan error jika login gagal -->
    <?php if($errors->any()): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        
        <div style="margin-bottom: 15px;">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;">
        </div>

        <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Ahmad Miqdad\Downloads\LaporBanjir_sesuai_soal\LaporBanjir2\resources\views/auth/login.blade.php ENDPATH**/ ?>
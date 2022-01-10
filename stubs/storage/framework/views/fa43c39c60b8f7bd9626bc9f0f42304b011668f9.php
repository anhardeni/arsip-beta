<?php $__env->startSection("title"); ?> Profile <?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="d-flex justify-content-end" style="margin-top: -30px; margin-right:-20px">
                            <a href="<?php echo e(route('users.uprofile', $user->id)); ?>"><i class="fa fa-edit" title="Edit"></i></a>
                        </div>
                        <h4 class="text-center h3 mb-4">MY PROFILE</h4>
                        <form>
                            <div class="text-center">
                                <img src="<?php echo e(asset('eatio/images/profile/pic1.png')); ?>" class="rounded-circle mb-2" alt="">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Nama Lengkap</strong></label>
                                <ul>
                                    <li><?php echo e(Auth::user()->name); ?></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>NIP</strong></label>
                                <ul>
                                    <li><?php echo e(Auth::user()->nip); ?></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Pangkat/Golongan</strong></label>
                                <ul>
                                    <li><?php echo e(Auth::user()->pangkat); ?></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Seksi</strong></label>
                                <ul>
                                    <li><?php echo e(Auth::user()->seksi); ?></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Bidang</strong></label>
                                <ul>
                                    <li><?php echo e(Auth::user()->bidang); ?></li>
                                </ul>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arsip-bete\resources\views/users/profile.blade.php ENDPATH**/ ?>
<?php $__env->startSection("title"); ?> Edit User <?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Index</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">

                <?php if(Session::get('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> <?php echo e(session('error')); ?>

                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <div class="basic-form">
                    <form action="<?php echo e(route('users.update', [$user->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="nama lengkap" value="<?php echo e($user->name); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" value="<?php echo e($user->nip); ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="pangkat">Pangkat</label>
                                <select id="pangkat" name="pangkat" class="form-control" value="<?php echo e($user->pangkat); ?>">
                                    <option>--Pilih Pangkat--</option>
                                    <?php $__currentLoopData = $pangkat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pkt->nama_pangkat); ?>" <?php echo e(($user->pangkat == $pkt->nama_pangkat) ? 'selected' : ''); ?>><?php echo e($pkt->nama_pangkat); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bidang">Bidang</label>
                                <select id="bidang" name="bidang" class="form-control">
                                    <option>--Pilih Bidang--</option>
                                    <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bdg->nama_bidang); ?>" <?php echo e(($user->bidang == $bdg->nama_bidang) ? 'selected' : ''); ?>><?php echo e($bdg->nama_bidang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="seksi">Seksi</label>
                                <select id="seksi" name="seksi" class="form-control">
                                    <label for="seksi">Seksi</label>
                                    <option>--Pilih Seksi--</option>
                                    <?php $__currentLoopData = $seksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sks->nama_seksi); ?>" <?php echo e(($user->seksi == $sks->nama_seksi) ? 'selected' : ''); ?>><?php echo e($sks->nama_seksi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control">
                                    <option>--Pilih Jabatan--</option>
                                    <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jbt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jbt->nama_jabatan); ?>" <?php echo e(($user->jabatan == $jbt->nama_jabatan) ? 'selected' : ''); ?>><?php echo e($jbt->nama_jabatan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control bg-light" name="username" id="username" placeholder="username" value="<?php echo e($user->username); ?>" disabled readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="roles">Role User</label>
                                <select id="roles" name="roles" class="form-control" value="<?php echo e($user->roles); ?>">
                                <option>--Pilih Role--</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rls->nama_roles); ?>" <?php echo e(($user->roles == $rls->nama_roles) ? 'selected' : ''); ?>><?php echo e($rls->nama_roles); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirm_password">Confirm Password</label>
                                <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="confirm password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="save">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arsip-bete\resources\views/users/edit.blade.php ENDPATH**/ ?>
<title>GUDANG - Input Kardus</title>

<?php $__env->startSection("content"); ?>

<div class="row">
    <div class="col-xl-4 col-lg-4 h-75">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SEARCH KARDUS</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <?php if(session('error')): ?>

                    <div class="alert alert-danger alert-dismissible fade show">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>

                    <?php endif; ?>
                    <form action="<?php echo e(route('gudang.search')); ?>" method="POST">
                        <?php echo method_field('GET'); ?>
                        <div class="form-group row">
                            <label for="no_kardus" class="col-sm-4 col-form-label">Nomor Kardus</label>
                            <div class="col-sm-8">
                                <input type="text" id="no_kardus" name="no_kardus" class="form-control border border-light" placeholder="nomor kardus">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
                            <div class="col-sm-8">
                                <input type="text" name="tahun" id="tahun" class="form-control border border-light" value="<?php echo e(\Carbon\Carbon::now()->year); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 mt-2">
                                <button type="submit" class="btn btn-primary">SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(session('status')): ?>
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DATA KARDUS</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">

                    <div class="alert alert-success alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success! </strong><?php echo e(session('status')); ?>

                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>


                    <!-- <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Error!</strong> <?php echo e($error); ?>

                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                    <?php endif; ?> -->

                    <form action="<?php echo e(route('gudang.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="<?php echo e(session('result')->id); ?>" name="kardus" id="id">

                        <div class="form-group row">
                            <label for="nomor_kardus" class="col-sm-2 col-form-label">Nomor Kardus</label>
                            <div class="col-sm-4">
                                <input name="nomor_kardus" id="nomor_kardus" type="text" class="form-control border border-light bg-light" value="<?php echo e(session('result')->no_kardus); ?>" readonly>
                            </div>
                            <label for="tanggal_kardus" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-4">
                                <input name="tanggal_kardus" id="tanggal_kardus" type="text" value="<?php echo e(session('result')->tanggal_kardus); ?>" class="form-control border border-light bg-light" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_batch" class="col-sm-2 col-form-label">Jumlah Batch</label>
                            <div class="col-sm-4">
                                <input name="jumlah_batch" id="jumlah_batch" value="<?php echo e(session('result')->batching()->count()); ?>" type="text" class="form-control border border-light bg-light" readonly>
                            </div>
                            <label for="jalur" class="col-sm-2 col-form-label">Jalur</label>
                            <div class="col-sm-4">
                                <input name="jalur" id="jalur" type="text" class="form-control border border-light bg-light" value="<?php echo e(session('result')->jalur); ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_gudang" class="col-sm-2 col-form-label">Gudang</label>
                            <select id="nama_gudang" name="nama_gudang" class="col-sm-4 form-control">
                                <option selected="selected">--Pilih Gudang--</option>
                                <?php $__currentLoopData = $gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($gdg->id); ?>"><?php echo e($gdg->nama_gudang); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="nama_rak" class="col-sm-2 col-form-label">Nomor Rak</label>
                            <select id="nama_rak" name="nama_rak" class="col-sm-4 form-control">
                                <option selected="selected">--Pilih rak--</option>
                            </select>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">MASUKKAN KE GUDANG</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>

<script>
    function dataRak(data) {
        console.log('dataRak adalah', data);
        var html = '';
        for (var i = 0; i < data.length; ++i) {
            html += `<option value="${data[i].id}">${data[i].nama_rak}</option>`;
        }
        // console.log(html);
        var namaRak = document.getElementById('nama_rak');
        namaRak.innerHTML = html;

    };
    var base = "<?php echo e(url('/gudang')); ?>";
    let gudang = document.querySelector('#nama_gudang');
    gudang.addEventListener('change', (e) => {
        // console.log('gudang berubah', e);
        var url = base + '/' + e.target.value + '/rak';
        console.log(url);
        $.ajax({
            dataType: "json",
            url: url,
            data: null,
            success: dataRak
        });
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arsip-bete\resources\views/gudang/create.blade.php ENDPATH**/ ?>
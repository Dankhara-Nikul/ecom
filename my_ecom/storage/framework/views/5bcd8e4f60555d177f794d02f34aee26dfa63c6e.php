
<?php $__env->startSection('page_title','Media'); ?>
<?php $__env->startSection('media_select','active'); ?>
<?php $__env->startSection('container'); ?>

<div class="row">
    <h1>Media</h1>
</div>
<hr>
<div class="row">
<form method="post" action="<?php echo e(url('admin/media/upload')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
        <div class="col-4">
            <section class="card">
                <input type="file" id="file-multiple-input" name="images[]" multiple accept="image/*>
            </section>
        </div>
        <div class="col-2">
            <section class="card">
           
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Upload
                </button>
            
            </section>
        </div>
</form>
</div>
<hr>
<div class="row">
    <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-2">
        <section class="card text-center">
       
            <img src="<?php echo e(asset('/storage/upload/product')); ?>/.<?php echo e($list->images); ?>">
            <p><?php echo e($list->images); ?></p>
        </section>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/media.blade.php ENDPATH**/ ?>
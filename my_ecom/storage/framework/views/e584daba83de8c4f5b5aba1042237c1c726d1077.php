
<?php $__env->startSection('page_title','Manage Attribute'); ?>
<?php $__env->startSection('category_select','active'); ?>
<?php $__env->startSection('container'); ?>
<h1 class="mb10">Manage Attribute</h1>
<a href="<?php echo e(url('admin/category/manage_attribute')); ?>/<?php echo e($sub_category_id); ?>">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('category.manage_attribute_process')); ?>/<?php echo e($sub_category_id); ?>/<?php echo e($id); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="attributes_name" class="control-label mb-1">Category Name</label>
                                        <input id="attributes_name" value="<?php echo e($attributes_name); ?>" name="attributes_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>



                                    <div class="col-md-4">
                                        <label for="attributes_value" class="control-label mb-1">Category Slug</label>
                                        <input id="attributes_value" value="<?php echo e($attributes_value); ?>" name="attributes_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        <?php $__errorArgs = ['category_slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo e($message); ?>

                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        
                                    </div>
                                    <div class="col-md-2">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                ADD
                                            </button>
                                        </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_attribute_add.blade.php ENDPATH**/ ?>
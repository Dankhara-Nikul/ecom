
<?php $__env->startSection('page_title','Manage Brand'); ?>
<?php $__env->startSection('brand_select','active'); ?>
<?php $__env->startSection('container'); ?>


<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   <?php echo e($message); ?>  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <h1 class="mb10">Manage Brand</h1>
    <a href="<?php echo e(url('admin/brand')); ?>">
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
                            <form action="<?php echo e(route('brand.manage_brand_process')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for="color" class="control-label mb-1">Brand </label>
                                            <input id="brand" value="<?php echo e($name); ?>" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            <?php $__errorArgs = ['name'];
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
                                        <div class="col-lg-142">
                                            <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                            <input id="is_home" name="is_home" type="checkbox" class="form-control" <?php echo e($is_home_selected); ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    <?php $__errorArgs = ['image'];
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

                                    <?php if($image!=''): ?>
                                        <img width="100px" src="<?php echo e(asset('storage/media/brand/'.$image)); ?>"/>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="<?php echo e($id); ?>"/>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
                        
        </div>
    </div>
                        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_brand.blade.php ENDPATH**/ ?>
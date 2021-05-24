
<?php $__env->startSection('page_title','Manage Category'); ?>
<?php $__env->startSection('category_select','active'); ?>
<?php $__env->startSection('container'); ?>
    <h1 class="mb10">Manage Category</h1>
    <a href="<?php echo e(url('admin/category')); ?>">
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
                            <form action="<?php echo e(route('category.manage_category_process')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Category Name</label>
                                            <input id="category_name" value="<?php echo e($category_name); ?>" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>

                                        

                                        <div class="col-md-4">
                                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                            <input id="category_slug" value="<?php echo e($category_slug); ?>" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    <?php $__errorArgs = ['category_image'];
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

                                    <?php if($category_image!=''): ?>
                                            <a href="<?php echo e(asset('storage/media/category/'.$category_image)); ?>" target="_blank"><img width="100px" src="<?php echo e(asset('storage/media/category/'.$category_image)); ?>"/></a>
                                        <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                    <input id="is_home" name="is_home" type="checkbox" <?php echo e($is_home_selected); ?>>
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_category.blade.php ENDPATH**/ ?>
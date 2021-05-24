
<?php $__env->startSection('page_title','Home Banner'); ?>
<?php $__env->startSection('home_banner_select','active'); ?>
<?php $__env->startSection('container'); ?>
    <h1 class="mb10">Manage Home Banner</h1>
    <a href="<?php echo e(url('admin/home_banner')); ?>">
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
                            <form action="<?php echo e(route('home_banner.manage_home_banner_process')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_name" class="control-label mb-1">Btn Text</label>
                                            <input id="btn_txt" value="<?php echo e($btn_txt); ?>" name="btn_txt" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        </div>

                                       
                                        <div class="col-md-6">
                                            <label for="category_slug" class="control-label mb-1">Btn Link</label>
                                            <input id="btn_link" value="<?php echo e($btn_link); ?>" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false">
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
                                            <a href="<?php echo e(asset('storage/media/banner/'.$image)); ?>" target="_blank"><img width="100px" src="<?php echo e(asset('storage/media/banner/'.$image)); ?>"/></a>
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_home_banner.blade.php ENDPATH**/ ?>
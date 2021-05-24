
<?php $__env->startSection('page_title','Category'); ?>
<?php $__env->startSection('category_select','active'); ?>
<?php $__env->startSection('container'); ?>
<?php if(session()->has('message')): ?>
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <?php echo e(session('message')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php endif; ?>
<h1 class="mb10"><?php echo e($name); ?> Category</h1>

<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('category.manage_category_process')); ?>/<?php echo e($id); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="category_name" class="control-label mb-1">Category Name</label>
                                        <input id="category_name" value="" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                        <input id="category_slug" value="" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                                    <div class="col-md-4">
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
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="image" class="control-label mb-1"> Show in Home Page</label>
                                        <input id="is_home" name="is_home" type="checkbox">
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
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($list->id); ?></td>
                        <td><?php echo e($list->category_name); ?></td>
                        <td><?php echo e($list->category_slug); ?></td>
                        <td>
                            <img width="100px" src="<?php echo e(asset('/storage/upload/category/'.$list->category_image)); ?>" />

                        </td>
                        <td>
                            <div class="table-data-feature">
                                <?php if($list->status==1): ?>
                                <a href="<?php echo e(url('admin/category/status/0')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                <?php elseif($list->status==0): ?>
                                <a href="<?php echo e(url('admin/category/status/1')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                <?php endif; ?>
                                <a href="<?php echo e(url('admin/category/manage_category/')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="<?php echo e(url('admin/category/delete')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </a>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>

                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_sub_category.blade.php ENDPATH**/ ?>
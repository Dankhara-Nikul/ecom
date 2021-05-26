    
    <?php $__env->startSection('page_title','Attribute'); ?>
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
    <h1 class="mb10"><?php echo e($name); ?> Attribute</h1>

    <a href="<?php echo e(url('admin/category/manage_attribute_add')); ?>/<?php echo e($sub_category_id); ?>">
        <button type="button" class="btn btn-success">
            Add Attribute
        </button>
    </a>
        <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->attributes_name); ?></td>
                                <td><?php echo e($list->attributes_value); ?></td>

                                <td>
                                    <div class="table-data-feature">


                                        <a href="<?php echo e(url('admin/category/manage_attribute_update')); ?>/<?php echo e($sub_category_id); ?>/<?php echo e($list->id); ?>">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        <a href="<?php echo e(url('admin/attribute/delete/')); ?>/<?php echo e($list->id); ?>">
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/manage_attribute.blade.php ENDPATH**/ ?>

<?php $__env->startSection('page_title','Product Review'); ?>
<?php $__env->startSection('product_review_select','active'); ?>
<?php $__env->startSection('container'); ?>
    <h1 class="mb10">Product Review</h1>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($list->id); ?></td>
                            <td><?php echo e($list->name); ?></td>
                            <td><?php echo e($list->pname); ?></td>
                            <td><?php echo e($list->rating); ?></td>
                            <td><?php echo e($list->review); ?></td>
                            <td><?php echo e(getCustomDate($list->added_on)); ?></td>
                            <td>
                                <div class="table-data-feature">
                                <?php if($list->status==1): ?>
                                <a href="<?php echo e(url('admin/update_product_review_status/0')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                <?php elseif($list->status==0): ?>
                                <a href="<?php echo e(url('admin/update_product_review_status/1')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                <?php endif; ?>
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/product_review.blade.php ENDPATH**/ ?>
;
<?php $__env->startSection('page_title','pattern'); ?>
<?php $__env->startSection('pattern_select','active'); ?>
<?php $__env->startSection('container'); ?>
<h1>Product Pattern</h1>

<div class="row pt-3">
    <div class="col-md-12">
        <!-- DATA TABLE -->

        <div class="table-data__tool">

            <a href="<?php echo e(url('admin/pattern/manage_pattern')); ?>">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add item
                </button>
            </a>

        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr >
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Pattern</th>
                        <th></th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-shadow">
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td><?php echo e($list->id); ?></td>
                        <td><?php echo e($list->pattern); ?></td>
                        <td></td>
                        
                        <td> </td>
                        <td></td>
                        <td>
                            <div class="table-data-feature">

                                <?php if($list->status==1): ?>
                                <a href="<?php echo e(url('admin/pattern/status/0')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Active">
                                        <i class="zmdi zmdi-eye"></i>
                                    </button>
                                </a>
                                <?php elseif($list->status==0): ?>
                                <a href="<?php echo e(url('admin/pattern/status/1')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Deactive">
                                        <i class="zmdi zmdi-eye-off"></i>
                                    </button>
                                </a>
                                <?php endif; ?>
                                <a href="<?php echo e(url('admin/pattern/manage_pattern/')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </a>
                                <a href="<?php echo e(url('admin/pattern/delete')); ?>/<?php echo e($list->id); ?>">
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
                    <tr class="spacer"></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/pattern.blade.php ENDPATH**/ ?>
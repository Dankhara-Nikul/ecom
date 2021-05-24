
<?php $__env->startSection('page_title','Order'); ?>
<?php $__env->startSection('order_select','active'); ?>
<?php $__env->startSection('container'); ?>
<h1 class="mb10">Order</h1>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="row mb-3 mt-5 ml-3">

            <select name="bluk" id="bluk">
                <option value="0">Bulk select</option>
                <?php $__currentLoopData = $order_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($list->id); ?>"><?php echo e($list->orders_status); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <input class=" ml-2 btn btn-info" type="button" value="Apply" onclick="order_status()">

            <select name="date" id="date" class="ml-5">
                <option value="0">All Date</option>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option value="<?php echo e($list->added_on); ?>"><?php echo e(($list->added_on)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="button" class="btn btn-primary m-l-10 m-b-10" onclick="order_filter()">Filter
             
            </button>
            <button type="button" class="btn btn-primary m-l-10 m-b-10" onclick="order_clear_filter()">Clear Filter
             
            </button>
            
        </div>

        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>
                            <label class="au-checkbox">
                                <input type="checkbox" onclick="toggle(this)">
                                <span class="au-checkmark"></span>
                            </label>
                        </th>
                        <th>Order ID</th>
                        <th>Customer Details</th>
                        <th>Amt</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Payment Type</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td id="ct1">
                            <label class="au-checkbox">
                                <input type="checkbox" name="chk" id="chk" value="<?php echo e($list->id); ?>">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td><a href="<?php echo e(url('/admin/order_detail')); ?>/<?php echo e($list->id); ?>"><?php echo e($list->id); ?></a></td>
                        <td>
                            <?php echo e($list->name); ?><br />
                            <?php echo e($list->email); ?><br />
                            <?php echo e($list->mobile); ?><br />
                            <?php echo e($list->address); ?>,<?php echo e($list->city); ?>,<?php echo e($list->state); ?>,<?php echo e($list->pincode); ?>

                        </td>
                        <td><?php echo e($list->total_amt); ?></td>
                        <td><?php echo e($list->orders_status); ?></td>
                        <td><?php echo e($list->payment_status); ?></td>
                        <td><?php echo e($list->payment_type); ?></td>
                        <td><?php echo e($list->added_on); ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="<?php echo e(url('admin/order_detail/')); ?>/<?php echo e($list->id); ?>">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                        <i class="zmdi zmdi-view-day"></i>
                                    </button>
                                </a>

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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/order.blade.php ENDPATH**/ ?>
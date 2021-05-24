
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
<h1 class="mb10">Category</h1>
<a href="<?php echo e(url('admin/category/manage_category')); ?>">
    <button type="button" class="btn btn-success">
        Add Category
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
                        <img width="100px" src="<?php echo e(asset('/storage/upload/category/'.$list->category_image)); ?>"/>
                        
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
                                <a href="<?php echo e(url('admin/category/manage_sub_category/')); ?>/<?php echo e($list->id); ?>">
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/category.blade.php ENDPATH**/ ?>
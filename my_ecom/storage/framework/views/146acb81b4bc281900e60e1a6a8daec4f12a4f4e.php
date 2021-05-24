<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="<?php echo e(asset('admin_assets/css/font-face.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('admin_assets/css/theme.css')); ?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            <?php echo e(Config::get('constants.site_name')); ?>

                            
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="<?php echo e(route('admin.auth')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                
                                <?php if(session()->has('error')): ?>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <?php echo e(session('error')); ?>  
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div> 
                                <?php endif; ?> 	
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo e(asset('admin_assets/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/vendor/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/main.js')); ?>"></script>
</body>
</html><?php /**PATH E:\laravel\laravel8EcomPart48\my_ecom\resources\views/admin/login.blade.php ENDPATH**/ ?>
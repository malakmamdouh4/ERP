<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="<?php echo e(trans('common.thisLang')); ?>" data-layout="semi-dark-layout" data-textdirection="<?php echo e(trans('common.dir')); ?>">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content=".">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <title><?php echo e($title); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('/AdminAssets/app-assets/images/ico/apple-icon-120.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('/AdminAssets/app-assets/images/ico/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/vendors/css/vendors-rtl.min.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/themes/bordered-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/themes/semi-dark-layout.css')); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/plugins/forms/form-validation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/pages/authentication.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/app-assets/css-rtl/custom-rtl.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/AdminAssets/assets/css/style-rtl.css')); ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="https://ilawfair.com" class="brand-logo">
                                    <img src="<?php echo e(asset('/AdminAssets/app-assets/images/logo/logo.png')); ?>" width="90%" />
                                </a>

                                <h4 class="card-title mb-1 text-center"><?php echo e(trans('common.Admin Panel')); ?></h4>

                                <?php if(session()->get('faild') != ''): ?>
                                    <div class="alert alert-danger py-2 text-center">
                                        <?php echo e(session()->get('faild')); ?>

                                    </div>
                                <?php endif; ?>
                                <form class="auth-login-form mt-2" action="<?php echo e(route('login')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label"><?php echo e(trans('common.email')); ?></label>
                                        <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password"><?php echo e(trans('common.password')); ?></label>
                                            <a href="<?php echo e(route('password.request')); ?>">
                                                <small><?php echo e(trans('common.Forgot Password?')); ?></small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" aria-describedby="login-password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember-me" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> <?php echo e(trans('common.Remember Me')); ?> </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4"><?php echo e(trans('common.Sign in')); ?></button>
                                </form>

                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('/AdminAssets/app-assets/vendors/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('/AdminAssets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(asset('/AdminAssets/app-assets/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('/AdminAssets/app-assets/js/core/app.js')); ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo e(asset('/AdminAssets/app-assets/js/scripts/pages/auth-login.js')); ?>"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/auth/login.blade.php ENDPATH**/ ?>
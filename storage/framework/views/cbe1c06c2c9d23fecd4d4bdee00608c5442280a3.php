<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <img src="<?php echo e(asset('/AdminAssets/app-assets/images/logo/logo.png')); ?>" style="height: auto;width: 88px;margin: auto;"/>
            
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class="<?php if(isset($active) && $active == 'panelHome'): ?> active <?php endif; ?> nav-item" >
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.index')); ?>">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.PanelHome')); ?>">
                        <?php echo e(trans('common.PanelHome')); ?>

                    </span>
                </a>
            </li>

            <li class="nav-item <?php if(isset($active) && $active == 'setting'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.settings.general')); ?>">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.setting')); ?>">
                        <?php echo e(trans('common.setting')); ?>

                    </span>
                </a>
            </li>
            
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="shield"></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.UsersManagment')); ?>">
                        <?php echo e(trans('common.UsersManagment')); ?>

                    </span>
                </a>
                <ul class="menu-content">
                    <li <?php if(isset($active) && $active == 'adminUsers'): ?> class="active" <?php endif; ?>>
                        <a class="d-flex align-items-center" href="<?php echo e(route('admin.adminUsers')); ?>">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="<?php echo e(trans('common.AdminUsers')); ?>">
                                <?php echo e(trans('common.AdminUsers')); ?>

                            </span>
                        </a>
                    </li>
                    <li <?php if(isset($active) && $active == 'roles'): ?> class="active" <?php endif; ?>>
                        <a class="d-flex align-items-center" href="<?php echo e(route('admin.roles')); ?>">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="<?php echo e(trans('common.Roles')); ?>">
                                <?php echo e(trans('common.Roles')); ?>

                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?php if(isset($active) && $active == 'clientUsers'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.clientUsers')); ?>">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.Clients')); ?>">
                        <?php echo e(trans('common.Clients')); ?>

                    </span>
                </a>
            </li>


            <li class="nav-item <?php if(isset($active) && $active == 'Activity'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.activities')); ?>">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.Activities')); ?>">
                        <?php echo e(trans('common.Activities')); ?>

                    </span>
                </a>
            </li>

            
            <li class="nav-item <?php if(isset($active) && $active == 'Service'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.services')); ?>">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.services')); ?>">
                        <?php echo e(trans('common.services')); ?>

                    </span>
                </a>
            </li>


            <li class="nav-item <?php if(isset($active) && $active == 'Feature'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.features')); ?>">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.features')); ?>">
                        <?php echo e(trans('common.features')); ?>

                    </span>
                </a>
            </li>

            <li class="nav-item <?php if(isset($active) && $active == 'Application'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.applications')); ?>">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.applications')); ?>">
                        <?php echo e(trans('common.applications')); ?>

                    </span>
                </a>
            </li>

            <li class="nav-item <?php if(isset($active) && $active == 'Partener'): ?> active <?php endif; ?>">
                <a class="d-flex align-items-center" href="<?php echo e(route('admin.parteners')); ?>">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="<?php echo e(trans('common.parteners')); ?>">
                        <?php echo e(trans('common.parteners')); ?>

                    </span>
                </a>
            </li>

          
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/layouts/AdminMenu.blade.php ENDPATH**/ ?>
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <img src="{{asset('/AdminAssets/app-assets/images/logo/logo.png')}}" style="height: auto;width: 88px;margin: auto;"/>
            
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class="@if(isset($active) && $active == 'panelHome') active @endif nav-item" >
                <a class="d-flex align-items-center" href="{{route('admin.index')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.PanelHome')}}">
                        {{trans('common.PanelHome')}}
                    </span>
                </a>
            </li>

            <li class="nav-item @if(isset($active) && $active == 'setting') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.settings.general')}}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.setting')}}">
                        {{trans('common.setting')}}
                    </span>
                </a>
            </li>
            
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="shield"></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.UsersManagment')}}">
                        {{trans('common.UsersManagment')}}
                    </span>
                </a>
                <ul class="menu-content">
                    <li @if(isset($active) && $active == 'adminUsers') class="active" @endif>
                        <a class="d-flex align-items-center" href="{{route('admin.adminUsers')}}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="{{trans('common.AdminUsers')}}">
                                {{trans('common.AdminUsers')}}
                            </span>
                        </a>
                    </li>
                    <li @if(isset($active) && $active == 'roles') class="active" @endif>
                        <a class="d-flex align-items-center" href="{{route('admin.roles')}}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="{{trans('common.Roles')}}">
                                {{trans('common.Roles')}}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if(isset($active) && $active == 'clientUsers') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.clientUsers')}}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.Clients')}}">
                        {{trans('common.Clients')}}
                    </span>
                </a>
            </li>


            <li class="nav-item @if(isset($active) && $active == 'Activity') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.activities')}}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.Activities')}}">
                        {{trans('common.Activities')}}
                    </span>
                </a>
            </li>

            
            <li class="nav-item @if(isset($active) && $active == 'Service') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.services')}}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.services')}}">
                        {{trans('common.services')}}
                    </span>
                </a>
            </li>


            <li class="nav-item @if(isset($active) && $active == 'Feature') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.features')}}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.features')}}">
                        {{trans('common.features')}}
                    </span>
                </a>
            </li>

            <li class="nav-item @if(isset($active) && $active == 'Application') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.applications')}}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.applications')}}">
                        {{trans('common.applications')}}
                    </span>
                </a>
            </li>

            <li class="nav-item @if(isset($active) && $active == 'Partener') active @endif">
                <a class="d-flex align-items-center" href="{{route('admin.parteners')}}">
                    <i data-feather='activity'></i>
                    <span class="menu-title text-truncate" data-i18n="{{trans('common.parteners')}}">
                        {{trans('common.parteners')}}
                    </span>
                </a>
            </li>

          
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

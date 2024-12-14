<div class="menu-item">
    <a class="menu-link {{ isset($active['dashboard']) ? 'active' : '' }}"
       href="{{ route('admin.dashboard.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-speedometer2"></i>
                </span>
        <span class="menu-title">{{ __('Dashboard') }}</span>
    </a>
</div>

@can('Settings Management')
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['settings']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-gear"></i>
                </span>
                <span class="menu-title">{{ __('Settings') }}</span>
                <span class="menu-arrow"></span>
            </span>


        <div class="menu-sub menu-sub-accordion {{ isset($active['websiteConfigurations'])  ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['websiteConfigurations']) ? 'active' : '' }}"
                   href="{{ route('admin.settings.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                    <span class="menu-title">{{ __('Website Configurations') }}</span>
                </a>
            </div>

        </div>

    </div>
@endcan

@can('Hr Management')
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['hr']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-journal-text"></i>
                </span>
                <span class="menu-title">{{ __('HR') }}</span>
                <span class="menu-arrow"></span>
            </span>


        <div
            class="menu-sub menu-sub-accordion {{ isset($active['roles']) || isset($active['staffs']) || isset($active['users']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['roles']) ? 'active' : '' }}"
                   href="{{ route('admin.roles.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                    <span class="menu-title">{{ __('Roles') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ isset($active['staffs']) ? 'active' : '' }}"
                   href="{{ route('admin.staffs.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                    <span class="menu-title">{{ __('Staffs') }}</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link {{ isset($active['users']) ? 'active' : '' }}"
                   href="{{ route('admin.users.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                    <span class="menu-title">{{ __('Users') }}</span>
                </a>
            </div>

        </div>

    </div>
@endcan
@can('Logs Management')
    <div class="menu-item">
        <a class="menu-link {{ isset($active['logs']) ? 'active' : '' }}"
           href="{{ route('admin.logs.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-window-stack"></i>
                </span>
            <span class="menu-title">{{ __('Logs & Bugs') }}</span>
        </a>
    </div>
@endcan

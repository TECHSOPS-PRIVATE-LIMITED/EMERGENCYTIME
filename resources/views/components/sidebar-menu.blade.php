<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo/>

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                          icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                          icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="{{ route('dashboard.index') }}"
                   class="navItem {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Home') }}</span>
                    </span>
                </a>
            </li>

            {{-- facilities --}}
            <li>
                <a href="{{ route('facilities.index') }}"
                   class="navItem {{ (request()->is('facilities*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="vaadin:hospital"></iconify-icon>
                        <span>{{ __('Facility') }}</span>
                    </span>
                </a>
            </li>
            {{-- facilities end --}}

            {{--equipments start--}}
            <li>
                <a href="{{ route('equipments.index') }}"
                   class="navItem {{ (request()->is('equipments*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="icon-park-solid:beauty-instrument"></iconify-icon>
                        <span>{{ __('Equipment') }}</span>
                    </span>
                </a>
            </li>
            {{--equipments end--}}

            {{--medicalstaffs start--}}
            <li>
                <a href="{{ route('medical_staffs.index') }}"
                   class="navItem {{ (request()->is('medicalstaffs*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="guidance:care-staff-area"></iconify-icon>
                        <span>{{ __('Medical Staff') }}</span>
                    </span>
                </a>
            </li>
            {{--medicalstaffs end--}}

            {{-- specialty start --}}
            @can('specialty index')
                <li>
                    <a href="{{ route('specialties.index') }}"
                       class="navItem {{ (request()->is('specialties*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="medical-icon:i-care-staff-area" width="1.2rem"
                                      height="1.2rem"></iconify-icon>
                        <span>{{ __('Specialty') }}</span>
                    </span>
                    </a>
                </li>
            @endcan
            {{-- specialty end --}}

            {{-- treatment start --}}
            @can('category index')
                <li>
                    <a href="{{ route('categories.index') }}"
                       class="navItem {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="iconamoon:category-thin" width="1.2rem" height="1.2rem"></iconify-icon>
                        <span>{{ __('Category') }}</span>
                    </span>
                    </a>
                </li>
            @endcan
            {{-- treatment end --}}


            {{-- treatment start --}}
            @can('treatment index')
                <li>
                    <a href="{{ route('treatments.index') }}"
                       class="navItem {{ (request()->is('treatments*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                         <iconify-icon class="nav-icon" icon="healthicons:water-treatment" width="1.2rem"
                                       height="1.2rem"></iconify-icon>
                        <span>{{ __('Treatment') }}</span>
                    </span>
                    </a>
                </li>
            @endcan
            {{-- treatment end --}}

            {{-- subscription start --}}
            @can('subscription index')
                <li>
                    <a href="{{ route('subscriptions.index') }}"
                       class="navItem {{ (request()->is('subscriptions*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon"  icon="streamline:subscription-cashflow-solid" width="1.2rem" height="1.2rem"></iconify-icon>
                        <span>{{ __('User Subscription') }}</span>
                    </span>
                    </a>
                </li>
            @endcan
            {{-- subscription end --}}

            {{-- attach hospitals --}}
            <li>
                <a href="{{ route('assign.to.facility.index') }}"
                   class="navItem {{ (request()->is('assign-to-facility*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="vaadin:hospital"></iconify-icon>
                        <span>{{ __('Assign To Hospitals') }}</span>
                    </span>
                </a>
            </li>
            {{-- attach hospitals end --}}

{{-- Database --}}
            <li>
                <a href="{{ route('database-backups.index') }}"
                   class="navItem {{ (request()->is('database-backups*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="iconoir:database-backup"></iconify-icon>
                        <span>{{ __('Database Backup') }}</span>
                    </span>
                </a>
            </li>
            <!-- Settings -->
            <li>
                <a href="{{ route('general-settings.show') }}"
                   class="navItem {{ (request()->is('general-settings*')) || (request()->is('users*')) || (request()->is('roles*')) || (request()->is('profiles*')) || (request()->is('permissions*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:settings-outline"></iconify-icon>
                        <span>{{ __('Settings') }}</span>
                    </span>
                </a>
            </li>
        </ul>

    </div>
</div>
<!-- End: Sidebar -->

<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class="space-y-5 ">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 md:grid-cols-2">
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300">
                                    <iconify-icon icon="heroicons:building-office-2"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    Company Settings
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Set up your company profile, add your company logo, and more
                            </div>
                            <a href="{{ route('general-settings.edit') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Change Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300">
                                    <iconify-icon icon="heroicons:user-circle"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    User
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Manage system user(Add, edit delete users).
                            </div>
                            <a href="{{ route('users.index') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Manage user</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300">
                                    <iconify-icon icon="heroicons:lock-closed"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    Role
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Manage Role (Add, Edit, Delete role)
                            </div>
                            <a href="{{ route('roles.index') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Change Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300">
                                    <iconify-icon icon="heroicons:lock-closed"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    Permission
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Manage Permission (Add, Edit, Delete Permission)
                            </div>
                            <a href="{{ route('permissions.index') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Change Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg text-white rounded-full bg-slate-800">
                                    <iconify-icon icon="heroicons:user"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    Profile Settings
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Set up your profile, add your profile photo, and more
                            </div>
                            <a href="{{ route('profiles.index') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Change Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-6 card-body">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                                <div
                                    class="flex flex-col items-center justify-center flex-none w-8 h-8 text-lg rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300">
                                    <iconify-icon icon="material-symbols-light:token-outline"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base font-medium text-slate-900 dark:text-white">
                                    Replicate Model Token
                                </div>
                            </div>
                            <div class="text-sm text-slate-600 dark:text-slate-300">
                                Do not change token until its necessary
                            </div>
                            <a href="{{ route('create_token') }}"
                                class="inline-flex items-center space-x-3 text-sm font-medium capitalize rtl:space-x-reverse text-slate-600 dark:text-slate-300">
                                <span>Change Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

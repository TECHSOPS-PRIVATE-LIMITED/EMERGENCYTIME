<x-app-layout>
    <div>
        {{-- breadcrumb start --}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{-- breadcrumb end --}}
    </div>

    <div>
        <div class="grid grid-cols-1 gap-6 mb-5 md:grid-cols-1">
            <div class="col-span-1 md:col-span-1">
                <div class="p-4 card">
                    <div class="grid col-span-1 gap-4 md:grid-cols-3">
                        <!-- BEGIN: Group chart12 -->
                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline1"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Total Facilities') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $facilitiesCount }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline2"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Total Users') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $usersCount }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline3"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Active Users') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $activeUsersCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Group chart12 -->

                        <div class="py-[18px] px-4 rounded-[6px] bg-[#E99E8E] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline1"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Total Doctor') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $medicalStaffsCount }}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="py-[18px] px-4 rounded-[6px] bg-[#0EEAD2] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline1"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Monthly Subscriptions') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $activeUsersCountMonthly }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-[18px] px-4 rounded-[6px] bg-[#3d85c4] dark:bg-slate-900	 ">
                            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div id="wline1"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-1 text-sm font-medium text-slate-800 dark:text-slate-300">
                                        <strong>{{ __('Yearly Subscriptions') }}</strong>
                                    </div>
                                    <div class="text-lg font-medium text-slate-900 dark:text-white">
                                        {{ $activeUsersCountYearly }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

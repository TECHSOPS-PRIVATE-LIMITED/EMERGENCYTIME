<x-app-layout>
    <div>
        <div class="mb-6 ">
            {{--Breadcrumb start--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>

        {{--Alert start--}}
        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'"/>
        @endif
        {{--Alert end--}}

        <div class="card">
            <header class="card-header noborder">
                <div class="flex flex-wrap items-center justify-end gap-3">
                    {{-- Create Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3"
                       href="{{ route('create_token') }}">
                        <iconify-icon icon="ic:round-plus" class="mr-1 text-lg">
                        </iconify-icon>
                        {{ __('New') }}
                    </a>
                    {{--Refresh Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5"
                       href="{{ route('show_token') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl "></iconify-icon>
                    </a>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-3 sm:flex lg:justify-end">
                    <div class="relative flex items-center w-full sm:w-auto">
                        <form id="searchForm" method="get" action="{{ route('show_token') }}">
                            <input name="q" type="text"
                                   class="p-2 pl-8 border rounded-md inputField border-slate-200 dark:border-slate-700 dark:bg-slate-900"
                                   placeholder="Search" value="{{ request()->q }}">
                        </form>
                        <iconify-icon class="absolute text-textColor left-2 dark:text-white"
                                      icon="quill:search-alt"></iconify-icon>
                    </div>
                </div>
            </header>
            <div class="px-6 pb-6 card-body">
                <div class="-mx-6 overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y table-fixed divide-slate-100 dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="table-th ">
                                        {{ __('Sl No') }}
                                    </th>
                                    <th scope="col" class="table-th ">
                                        {{ __('Token') }}
                                    </th>
                                    <th scope="col" class="table-th ">
                                        {{ __('Created At') }}
                                    </th>
                                    <th scope="col" class="table-th ">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @if ($token)
                                    <tr>
                                        <td class="table-td">
                                            # {{ $token->id }}
                                        </td>
                                        <td class="table-td">
                                            {{ $token->model_token ?? 'N/A' }}
                                        </td>
                                        <td class="table-td">
                                            {{ $token->created_at->diffForHumans() ?? 'N/A' }}
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                {{-- view--}}
                                                <a class="action-btn" href="{{ route('show_token') }}">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                {{-- delete--}}
                                                    <form id="deleteForm{{ $token->id }}" method="POST"
                                                          action="{{ route('delete_token', $token) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="cursor-pointer action-btn"
                                                           onclick="sweetAlertDelete(event, 'deleteForm{{ $token->id }}')"
                                                           type="submit">
                                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                        </a>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="relative border border-slate-100 dark:border-slate-900">
                                        <td class="table-cell text-center" colspan="4">
                                            <img src="{{ asset('images/result-not-found.svg') }}" alt="page not found"
                                                 class="w-64 m-auto"/>
                                            <h2 class="mb-8 -mt-4 text-xl text-slate-700">{{ __('No results found.') }}</h2>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            function sweetAlertDelete(event, formId) {
                event.preventDefault();
                let form = document.getElementById(formId);
                Swal.fire({
                    title: '@lang('Are you sure ? ')',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: '@lang('Delete ')',
                    denyButtonText: '@lang('Cancel ')',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>

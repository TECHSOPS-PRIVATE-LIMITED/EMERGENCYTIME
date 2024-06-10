<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        <div class="card xl:col-span-1">
            <div class="flex flex-col p-6 card-body">
                <div class="h-full card-text">
                    <form class="space-y-4" method="POST" action="{{ route('store_token') }}">
                        @csrf
                        <div class="grid gap-12 md:grid-cols-1">

                            {{-- model_token start --}}
                            <div class="input-area">
                                <label for="model_token" class="form-label">{{ __('Model Token ') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="model_token" name="model_token" class="form-control"
                                           placeholder="Enter token"
                                           value="{{ old('model_token') }}" required>
                                    <x-input-error :messages="$errors->get('model_token')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- model_token end --}}
                        </div>
                        <button class="flex justify-center ml-auto btn btn-dark">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

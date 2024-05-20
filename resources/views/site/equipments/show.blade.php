<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        {{--Create equipment form start--}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4">

                        {{-- Image display start --}}

                        {{-- Image field --}}
                        <div class="grid md:grid-cols-1 grid-cols-1 gap-12">
                            @if ($equipment->image)
                                <div class="relative flex justify-center items-center">
                                    {{-- Image preview --}}
                                    <img
                                        src="{{ asset($equipment->image) }}"
                                        alt="{{ $equipment->name ?? 'Equipment Image' }}"
                                        class="max-h-64 max-w-xl rounded-lg transition duration-300"
                                        readonly
                                    />
                                </div>
                            @else
                                <div
                                    class="relative flex items-center justify-center bg-gray-200 h-48 rounded-lg text-gray-500">
                                    {{ __('No image available') }}
                                </div>
                            @endif
                        </div>

                        {{-- Image display end --}}

                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter equipment name"
                                           value="{{ old('name', $equipment->name) }}" readonly>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- last_maintenance_date start --}}
                            <div class="input-area">
                                <label for="last_maintenance_date"
                                       class="form-label">{{ __('Maintenance Date') }}</label>
                                <div class="relative">
                                    <input type="date" id="last_maintenance_date" name="last_maintenance_date"
                                           class="form-control"
                                           placeholder="Enter your maintenance date"
                                           value="{{ old('last_maintenance_date', $equipment->last_maintenance_date ?? 'N/A') }}"
                                           readonly
                                    >
                                    <x-input-error :messages="$errors->get('last_maintenance_date')" class="mt-2"/>

                                </div>
                            </div>
                            {{-- last_maintenance_date end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="description" name="description" class="form-control"
                                                  placeholder="Enter equipment description"
                                                  readonly
                                        >{{ old('description',$equipment->description ?? 'N/A')  }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>
</x-app-layout>

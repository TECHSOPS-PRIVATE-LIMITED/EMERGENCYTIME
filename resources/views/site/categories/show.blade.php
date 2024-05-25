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
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter  name"
                                           value="{{ old('name', $category->name) }}" readonly>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- Created_at start --}}
                            <div class="input-area">
                                <label for="created_at" class="form-label">{{ __('Created At') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="created_at" name="created_at" class="form-control"
                                           placeholder="Created At"
                                           value="{{ old('created_at', optional($category->created_at)->format('Y-m-d H:i:s')) }}" readonly>
                                    <x-input-error :messages="$errors->get('created_at')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Created_at end --}}

                            {{--  image start --}}
                            <div class="input-area">
                                <label for="image" class="form-label">{{ __('Category Image ') }}</label>
                                <div class="relative">
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="w-20 h-20 object-cover">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>

                            {{-- image end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="description" name="description" class="form-control"
                                                  placeholder="Enter equipment description"
                                                  readonly
                                        >{{ old('description', $specialty->description ?? 'N/A') }}</textarea>
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

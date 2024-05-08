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

                            {{-- category_name start --}}
                            <div class="input-area">
                                <label for="category_name" class="form-label">{{ __('Category Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="category_name" name="category_name" class="form-control"
                                           placeholder="Enter equipment name"
                                           value="{{ old('category_name', $treatment->category_name) }}" readonly>
                                    <x-input-error :messages="$errors->get('category_name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- category_name end --}}

                            {{-- category_name start --}}
                            <div class="input-area">
                                <label for="disease_name" class="form-label">{{ __('Disease Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="disease_name" name="disease_name" class="form-control"
                                           placeholder="Enter equipment name"
                                           value="{{ old('disease_name',$treatment->disease_name) }}" readonly>
                                    <x-input-error :messages="$errors->get('disease_name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- category_name end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="description" name="description" class="form-control"
                                                  placeholder="Enter equipment description"
                                                  readonly
                                        >{{ old('description', $treatment->description ?? 'N/A') }}</textarea>
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

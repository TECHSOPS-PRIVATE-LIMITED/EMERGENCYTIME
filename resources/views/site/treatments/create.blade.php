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
                    <form class="space-y-4" method="POST" action="{{ route('treatments.store') }}">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- category_name start --}}
                            <div class="input-area">
                                <label for="category_id" class="form-label">{{ __('Category') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        <option value="" disabled selected>Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- category_name end --}}

                            {{-- disease_name start --}}
                            <div class="input-area">
                                <label for="disease_name" class="form-label">{{ __('Disease Name') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="disease_name" name="disease_name" class="form-control"
                                           placeholder="Enter category name e.g: Bone"
                                           value="{{ old('disease_name') }}" required>
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
                                        >{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}

                            {{-- precautions start --}}
                            <div class="input-area">
                                <label for="precautions" class="form-label">{{ __('Precautions') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="precautions" name="precautions" class="form-control"
                                                  placeholder="Enter precautions"
                                        >{{ old('precautions') }}</textarea>
                                    <x-input-error :messages="$errors->get('precautions')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  precautions end --}}

                            {{-- symptoms start --}}
                            <div class="input-area">
                                <label for="symptoms" class="form-label">{{ __('Symptoms') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="symptoms" name="symptoms" class="form-control"
                                                  placeholder="Enter symptoms"
                                        >{{ old('symptoms') }}</textarea>
                                    <x-input-error :messages="$errors->get('symptoms')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  symptoms end --}}

                            {{-- medications start --}}
                            <div class="input-area">
                                <label for="medications" class="form-label">{{ __('Medications') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="medications" name="medications" class="form-control"
                                                  placeholder="Enter medications"
                                        >{{ old('medications') }}</textarea>
                                    <x-input-error :messages="$errors->get('medications')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  medications end --}}

                            {{-- procedures start --}}
                            <div class="input-area">
                                <label for="procedures" class="form-label">{{ __('Procedures') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="procedures" name="procedures" class="form-control"
                                                  placeholder="Enter medications"
                                        >{{ old('procedures') }}</textarea>
                                    <x-input-error :messages="$errors->get('procedures')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  procedures end --}}
                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>

</x-app-layout>

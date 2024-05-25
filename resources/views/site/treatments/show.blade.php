<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{-- Breadcrumb end --}}

        {{-- Display treatment details start --}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- Category Name --}}
                            <div class="input-area">
                                <label for="category_id" class="form-label">{{ __('Category Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="category_id" name="category_id" class="form-control"
                                           placeholder="Enter category name"
                                           value="{{ old('category_id', $treatment->category->name) }}" readonly>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Disease Name --}}
                            <div class="input-area">
                                <label for="disease_name" class="form-label">{{ __('Disease Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="disease_name" name="disease_name" class="form-control"
                                           placeholder="Enter disease name"
                                           value="{{ old('disease_name', $treatment->disease_name ?? 'N/A') }}" readonly>
                                    <x-input-error :messages="$errors->get('disease_name')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                    <textarea id="description" name="description" class="form-control"
                                              placeholder="Enter description"
                                              readonly>{{ old('description', $treatment->description ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Precautions --}}
                            <div class="input-area">
                                <label for="precautions" class="form-label">{{ __('Precautions') }}</label>
                                <div class="relative">
                                    <textarea id="precautions" name="precautions" class="form-control"
                                              placeholder="Enter precautions"
                                              readonly>{{ old('precautions', $treatment->precautions ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('precautions')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Symptoms --}}
                            <div class="input-area">
                                <label for="symptoms" class="form-label">{{ __('Symptoms') }}</label>
                                <div class="relative">
                                    <textarea id="symptoms" name="symptoms" class="form-control"
                                              placeholder="Enter symptoms"
                                              readonly>{{ old('symptoms', $treatment->symptoms ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('symptoms')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Medications --}}
                            <div class="input-area">
                                <label for="medications" class="form-label">{{ __('Medications') }}</label>
                                <div class="relative">
                                    <textarea id="medications" name="medications" class="form-control"
                                              placeholder="Enter medications"
                                              readonly>{{ old('medications', $treatment->medications ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('medications')" class="mt-2"/>
                                </div>
                            </div>

                            {{-- Procedures --}}
                            <div class="input-area">
                                <label for="procedures" class="form-label">{{ __('Procedures') }}</label>
                                <div class="relative">
                                    <textarea id="procedures" name="procedures" class="form-control"
                                              placeholder="Enter procedures"
                                              readonly>{{ old('procedures', $treatment->procedures ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('procedures')" class="mt-2"/>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Display treatment details end --}}
    </div>
</x-app-layout>

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
                    <form class="space-y-4" method="POST" action="{{ route('equipments.update', $equipment) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Image display start --}}

                        {{-- Image field --}}
                        <div class="grid md:grid-cols-1 grid-cols-1 gap-12">
                            @if ($equipment->image)
                                <div class="relative flex justify-center items-center mx-auto">
                                    {{-- Image preview --}}
                                    <img
                                        src="{{ asset($equipment->image) }}"
                                        id="previewImage"
                                        alt="{{ $equipment->name ?? 'Equipment Image' }}"
                                        class="w-full max-h-64 object-cover rounded-lg cursor-pointer transition duration-300"
                                    />

                                    {{-- Overlay for file upload --}}
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition duration-300"
                                    >
                                        <div class="bg-amber-400 p-3 rounded-lg flex items-center justify-center">
                                            <label for="imageUpload"
                                                   class="text-gray-800 cursor-pointer flex items-center">
                                                <iconify-icon icon="line-md:upload-loop" width="1.2rem" height="1.2rem"></iconify-icon>
                                                {{ __('Change Image') }}
                                            </label>
                                        </div>
                                    </div>
                                    {{-- File input (hidden) --}}
                                    <input
                                        type="file"
                                        id="imageUpload"
                                        name="image"
                                        class="hidden"
                                        accept="image/*"
                                    />
                                </div>
                            @else
                                <div
                                    class="relative flex items-center justify-center bg-gray-200 h-48 w-full rounded-lg text-gray-500">
                                    {{ __('No image available') }}
                                    {{-- File input (hidden) --}}
                                    <input
                                        type="file"
                                        id="imageUpload"
                                        name="image"
                                        class="hidden"
                                        accept="image/*"
                                    />
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
                                           value="{{ old('name', $equipment->name) }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                                        >{{ old('description',$equipment->description ?? 'N/A')  }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}
                        </div>
                        {{-- update button start --}}
                        <button class="btn flex justify-center btn-dark ml-auto">{{ __('Update') }}</button>
                        {{-- update button end --}}
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>

    @push('scripts')
        <script>
            // Handle image upload interaction
            const previewImage = document.getElementById('previewImage');
            const imageUpload = document.getElementById('imageUpload');

            if (previewImage) {
                previewImage.addEventListener('click', () => {
                    imageUpload.click();
                });
            }

            if (imageUpload) {
                imageUpload.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            if (previewImage) {
                                previewImage.src = e.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>

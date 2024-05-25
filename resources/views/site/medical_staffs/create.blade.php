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
                    <form class="space-y-4" method="POST" action="{{ route('medical_staffs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter equipment name"
                                           value="{{ old('name') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- role start --}}
                            <div class="input-area">
                                <label for="role"
                                       class="form-label">{{ __('Role') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="role" name="role"
                                           class="form-control"
                                           placeholder="Enter your role"
                                           value="{{ old('role') }}">
                                    <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- role end --}}

                            {{--  image start --}}
                            <div class="input-area">
                                <label for="image"
                                       class="form-label">{{ __('Equipment Image') }}</label>
                                <div class="relative">
                                    <input type="file" id="image" name="image"
                                           class="form-control"
                                           placeholder="Upload image"
                                           accept="image/*">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                    {{-- Image preview --}}
                                    <div id="image-preview-container" style="margin-top: 10px;">
                                        <img id="image-preview" src="" alt="Image Preview" style="display: none; width: 100px; height: 100px; object-fit: cover;" />
                                    </div>
                                </div>
                            </div>
                            {{--  image end --}}

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
                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>

    @push('scripts')
        <script>
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');

            imageInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });
        </script>
    @endpush
</x-app-layout>

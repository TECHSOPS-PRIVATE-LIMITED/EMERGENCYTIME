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
                    <form class="space-y-4" method="POST" action="{{ route('categories.update', $category) }}" >
                        @csrf
                        @method('PUT')
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter category name"
                                           value="{{ old('name', $category->name) }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="description" name="description" class="form-control"
                                                  placeholder="Enter category description"
                                        >{{ old('description', $category->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}

                            {{-- image start --}}
                            <div class="input-area">
                                <label for="image" class="form-label">{{ __('Category Image') }}</label>
                                <div class="relative">
                                    {{-- Display the current image --}}
                                    @if ($category->image)
                                        <img id="current-image" src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="w-20 h-20 object-cover mb-2 cursor-pointer">
                                    @else
                                        <p>No image available</p>
                                    @endif

                                    {{-- Hidden input field for updating the image --}}
                                    <input type="file" id="image" name="image" class="hidden" accept="image/*">
                                    <small>Click on image to change image</small>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- image end --}}

                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{--Create  form end--}}
    </div>
@push('scripts')
        {{-- JavaScript for image preview and removal --}}
        <script>
            document.getElementById('current-image').addEventListener('click', function() {
                document.getElementById('image').click();
            });

            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const preview = document.getElementById('current-image');
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            });
        </script>
@endpush
</x-app-layout>

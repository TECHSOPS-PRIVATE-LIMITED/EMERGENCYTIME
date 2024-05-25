<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{--Create category form start--}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter category name"
                                           value="{{ old('name') }}" required>
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
                                        >{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}

                            {{-- image start --}}
                            <div>
                                <label for="image" class="form-label">{{ __('Category Image') }}</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                <div class="relative mt-4">
                                    <img id="image-preview" class="hidden w-20 h-20 object-cover" alt="image"/>
                                    <button type="button" id="remove-image" class="hidden absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">X</button>
                                </div>
                            </div>
                            {{-- image end --}}
                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        {{--Create category form end--}}
    </div>

    {{-- Image preview script --}}
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('image-preview');
                const removeBtn = document.getElementById('remove-image');
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
                removeBtn.classList.remove('hidden');
            }
        });

        document.getElementById('remove-image').addEventListener('click', function() {
            const imageInput = document.getElementById('image');
            const preview = document.getElementById('image-preview');
            const removeBtn = document.getElementById('remove-image');
            imageInput.value = '';
            preview.src = '';
            preview.classList.add('hidden');
            removeBtn.classList.add('hidden');
        });
    </script>
</x-app-layout>

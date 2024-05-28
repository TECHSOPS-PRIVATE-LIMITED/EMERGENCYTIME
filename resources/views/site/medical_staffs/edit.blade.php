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
                    <form class="space-y-4" method="POST" action="{{ route('medical_staffs.update', $medicalStaff) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Image display start --}}
                        <div class="grid md:grid-cols-1 grid-cols-1 gap-12">
                            <div class="relative flex justify-center items-center mx-auto">
                                {{-- Image preview --}}
                                @if ($medicalStaff->image)
                                    <img
                                        src="{{ asset($medicalStaff->image) }}"
                                        id="previewImage"
                                        alt="{{ $medicalStaff->name ?? 'Medical Staff Image' }}"
                                        class="w-full max-h-64 object-cover rounded-lg cursor-pointer transition duration-300"
                                    />
                                @else
                                    <div
                                        id="previewImagePlaceholder"
                                        class="relative flex items-center justify-center bg-gray-200 h-48 w-full rounded-lg text-gray-500 cursor-pointer"
                                    >
                                        {{ __('Click to upload image') }}
                                    </div>
                                @endif

                                {{-- Overlay for file upload --}}
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition duration-300"
                                >
                                    <div class="bg-amber-400 p-3 rounded-lg flex items-center justify-center">
                                        <label for="imageUpload"
                                               class="text-gray-800 cursor-pointer flex items-center">
                                            <iconify-icon icon="line-md:upload-loop" width="1.2rem"
                                                          height="1.2rem"></iconify-icon>
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
                        </div>
                        {{-- Image display end --}}


                        <div class="grid md:grid-cols-2 gap-6">
                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter name"
                                           value="{{ old('name', $medicalStaff->name) }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- email start --}}
                            <div class="input-area">
                                <label for="email" class="form-label">{{ __('Email') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="form-control"
                                           placeholder="Enter email"
                                           value="{{ old('email', $medicalStaff->email) }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- email end --}}

                            {{-- medical_license_number start --}}
                            <div class="input-area">
                                <label for="medical_license_number"
                                       class="form-label">{{ __('Medical License Number') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="medical_license_number" name="medical_license_number"
                                           class="form-control"
                                           placeholder="Enter medical license number"
                                           value="{{ old('medical_license_number', $medicalStaff->medical_license_number) }}"
                                           required>
                                    <x-input-error :messages="$errors->get('medical_license_number')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- medical_license_number end --}}

                            {{-- gender start --}}
                            <div class="input-area">
                                <label for="gender" class="form-label">{{ __('Gender') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option
                                            value="male" {{ old('gender', $medicalStaff->gender) == 'male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option
                                            value="female" {{ old('gender', $medicalStaff->gender) == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option
                                            value="other" {{ old('gender', $medicalStaff->gender) == 'other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- gender end --}}

                            {{-- current_employment start --}}
                            <div class="input-area">
                                <label for="current_employment" class="form-label">{{ __('Current Employment') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="current_employment" name="current_employment" class="form-control"
                                            required>
                                        <option
                                            value="yes" {{ old('current_employment', $medicalStaff->current_employment) == 'yes' ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option
                                            value="no" {{ old('current_employment', $medicalStaff->current_employment) == 'no' ? 'selected' : '' }}>
                                            No
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('current_employment')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- current_employment end --}}

                            {{-- dob start --}}
                            <div class="input-area">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="date" id="dob" name="dob" class="form-control"
                                           placeholder="Enter date of birth"
                                           value="{{ old('dob', $medicalStaff->dob) }}" required>
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- dob end --}}

                            {{-- address start --}}
                            <div class="input-area">
                                <label for="address" class="form-label">{{ __('Address') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="address" name="address" class="form-control"
                                           placeholder="Enter address"
                                           value="{{ old('address', $medicalStaff->address) }}" required>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- address end --}}

                            {{-- phone start --}}
                            <div class="input-area">
                                <label for="phone" class="form-label">{{ __('Phone') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           placeholder="Enter phone number"
                                           value="{{ old('phone', $medicalStaff->phone) }}" required>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- phone end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                    <textarea id="description" name="description" class="form-control"
                                              placeholder="Enter description"
                                    >{{ old('description', $medicalStaff->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- description end --}}

                            {{-- facility_id start --}}
                            <div class="input-area">
                                <label for="facility_id" class="form-label">{{ __('Facility') }}</label>
                                <div class="relative">
                                    <select id="facility_id" name="facility_id" class="form-control" >
                                        @foreach ($facilities as $facility)
                                            <option
                                                value="{{ $facility->id }}" {{ old('facility_id', $medicalStaff->facility_id) == $facility->id ? 'selected' : '' }}>
                                                {{ $facility->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('facility_id')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- facility_id end --}}

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
            const previewImage = document.getElementById('previewImage');
            const imageUpload = document.getElementById('imageUpload');
            const previewImagePlaceholder = document.getElementById('previewImagePlaceholder');

            const handleImageUpload = (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        if (previewImage) {
                            previewImage.src = e.target.result;
                        } else {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.id = 'previewImage';
                            img.classList.add('w-full', 'max-h-64', 'object-cover', 'rounded-lg', 'cursor-pointer', 'transition', 'duration-300');
                            previewImagePlaceholder.replaceWith(img);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            };

            if (previewImage) {
                previewImage.addEventListener('click', () => {
                    imageUpload.click();
                });
            }

            if (previewImagePlaceholder) {
                previewImagePlaceholder.addEventListener('click', () => {
                    imageUpload.click();
                });
            }

            if (imageUpload) {
                imageUpload.addEventListener('change', handleImageUpload);
            }
        </script>
    @endpush
</x-app-layout>

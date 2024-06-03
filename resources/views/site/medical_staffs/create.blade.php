<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{-- Breadcrumb end --}}

        {{-- Create medical staff form start --}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4" method="POST" action="{{ route('medical_staffs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- Full Name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Full Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Full Name end --}}

                            {{-- Email start --}}
                            <div class="input-area">
                                <label for="email" class="form-label">{{ __('Email') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Email end --}}

                            {{-- Gender start --}}
                            <div class="input-area">
                                <label for="gender" class="form-label">{{ __('Gender') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Gender end --}}

                            {{-- DOB start --}}
                            <div class="input-area">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob') }}" required>
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- DOB end --}}

                            {{-- Contact Address start --}}
                            <div class="input-area">
                                <label for="address" class="form-label">{{ __('Contact Address') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter contact address" value="{{ old('address') }}" required>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Contact Address end --}}

                            {{-- Phone Number start --}}
                            <div class="input-area">
                                <label for="phone" class="form-label">{{ __('Phone Number') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone') }}" required>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Phone Number end --}}

                            {{-- Medical License Number start --}}
                            <div class="input-area">
                                <label for="medical_license_number" class="form-label">{{ __('Medical License Number') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="medical_license_number" name="medical_license_number" class="form-control" placeholder="Enter medical license number" value="{{ old('medical_license_number') }}" required>
                                    <x-input-error :messages="$errors->get('medical_license_number')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Medical License Number end --}}

                            {{-- Current Employment start --}}
                            <div class="input-area">
                                <label for="current_employment" class="form-label">{{ __('Current Employment') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="current_employment" name="current_employment" class="form-control" required>
                                        <option value="yes" {{ old('current_employment') == 'yes' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                        <option value="no" {{ old('current_employment') == 'no' ? 'selected' : '' }}>{{ __('No') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Current Employment end --}}

                            {{-- Facility ID start --}}
                            <div class="input-area">
                                <label for="facility_id" class="form-label">{{ __('Facility') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <select id="facility_id" name="facility_id" class="form-control" required>
                                        <option selected disabled>{{ __('Select Facility') }}</option>
                                        @forelse($facilities as $facility)
                                            <option value="{{ $facility->id }}" {{ old('facility_id') == $facility->id ? 'selected' : '' }}>{{ $facility->name }}</option>
                                        @empty
                                            <option value="">{{ __('N/A') }}</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('facility_id')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Facility ID end --}}

                            {{-- Specialties start --}}
                            <div class="input-area">
                                <label for="specialty_id" class="form-label">{{ __('Specialties') }}</label>
                                <div class="relative">
                                    <select id="specialty_id" name="specialty_id[]" class="form-control select2" multiple>
                                        @foreach($specialties as $specialty)
                                            <option value="{{ $specialty->id }}" {{ in_array($specialty->id, old('specialty_id', [])) ? 'selected' : '' }}>
                                                {{ $specialty->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('specialty_id')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Specialties end --}}

                            {{-- Image start --}}
                            <div class="input-area">
                                <label for="image" class="form-label">{{ __('Image') }}</label>
                                <div class="relative">
                                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                    {{-- Image preview --}}
                                    <div id="image-preview-container" style="margin-top: 10px;">
                                        <img id="image-preview" src="" alt="Image Preview" style="display: none; width: 100px; height: 100px; object-fit: cover;" />
                                    </div>
                                </div>
                            </div>
                            {{-- Image end --}}

                            {{-- Description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- Description end --}}
                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- Create medical staff form end --}}
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

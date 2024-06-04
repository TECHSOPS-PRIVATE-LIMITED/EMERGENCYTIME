<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{-- Breadcrumb end --}}

        {{-- Create equipment form start --}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4">

                        {{-- Image display start --}}
                        <div class="grid md:grid-cols-1 grid-cols-1 gap-12">
                            @if ($medicalStaff->image)
                                <div class="relative flex justify-center items-center">
                                    {{-- Image preview --}}
                                    <img src="{{ asset($medicalStaff->image) }}"
                                        alt="{{ $medicalStaff->name ?? 'Image' }}"
                                        class="max-h-64 max-w-xl rounded-lg transition duration-300" readonly />
                                </div>
                            @else
                                <div
                                    class="relative flex items-center justify-center bg-gray-200 h-48 rounded-lg text-gray-500">
                                    {{ __('No image available') }}
                                </div>
                            @endif
                        </div>
                        {{-- Image display end --}}

                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Enter name" value="{{ old('name', $medicalStaff->name) }}"
                                        readonly>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- email start --}}
                            <div class="input-area">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $medicalStaff->email) }}" readonly>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            {{-- email end --}}

                            {{-- medical_license_number start --}}
                            <div class="input-area">
                                <label for="medical_license_number"
                                    class="form-label">{{ __('Medical License Number') }}</label>
                                <div class="relative">
                                    <input type="text" id="medical_license_number" name="medical_license_number"
                                        class="form-control"
                                        value="{{ old('medical_license_number', $medicalStaff->medical_license_number) }}"
                                        readonly>
                                    <x-input-error :messages="$errors->get('medical_license_number')" class="mt-2" />
                                </div>
                            </div>
                            {{-- medical_license_number end --}}

                            {{-- gender start --}}
                            <div class="input-area">
                                <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                <div class="relative">
                                    <input type="text" id="gender" name="gender" class="form-control"
                                        value="{{ old('gender', $medicalStaff->gender) }}" readonly>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>
                            </div>
                            {{-- gender end --}}

                            {{-- current_employment start --}}
                            <div class="input-area">
                                <label for="current_employment"
                                    class="form-label">{{ __('Current Employment') }}</label>
                                <div class="relative">
                                    <input type="text" id="current_employment" name="current_employment"
                                        class="form-control"
                                        value="{{ old('current_employment', $medicalStaff->current_employment) }}"
                                        readonly>
                                    <x-input-error :messages="$errors->get('current_employment')" class="mt-2" />
                                </div>
                            </div>
                            {{-- current_employment end --}}

                            {{-- dob start --}}
                            <div class="input-area">
                                <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                                <div class="relative">
                                    <input type="date" id="dob" name="dob" class="form-control"
                                        value="{{ old('dob', $medicalStaff->dob) }}" readonly>
                                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                </div>
                            </div>
                            {{-- dob end --}}

                            {{-- address start --}}
                            <div class="input-area">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <div class="relative">
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ old('address', $medicalStaff->address) }}" readonly>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                            </div>
                            {{-- address end --}}

                            {{-- phone start --}}
                            <div class="input-area">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <div class="relative">
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ old('phone', $medicalStaff->phone) }}" readonly>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                            {{-- phone end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter description" readonly>{{ old('description', $medicalStaff->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            {{-- description end --}}

                            {{-- facility_id start --}}
                            <div class="input-area">
                                <label for="facilityName" class="form-label">{{ __('Facility') }}</label>
                                <div class="relative">
                                    <input type="text" id="facilityName" name="facilityName" class="form-control"
                                        value="{{ old('facility_id', $medicalStaff->facilities->pluck('name')->implode(', ') ?? 'N/A') }}"
                                        readonly>
                                    <x-input-error :messages="$errors->get('facility_id')" class="mt-2" />
                                </div>
                            </div>
                            {{-- facility_id end --}}

                            {{-- specialites start --}}
                            <div class="input-area">
                                <label for="specialty_id" class="form-label">{{ __('Specialty') }}</label>
                                <div class="relative">
                                    <select class="form-control" multiple readonly>
                                        @foreach ($medicalStaff->specialties as $specialty)
                                            <option>{{ $specialty->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('specialty_id')" class="mt-2" />
                                </div>
                            </div>
                            {{-- specialites end --}}

                            {{-- user_id start --}}
                            <div class="input-area">
                                <label for="user_id" class="form-label">{{ __('Created By') }}</label>
                                <div class="relative">
                                    <input type="text" id="user_id" name="user_id" class="form-control"
                                        value="{{ old('user_id', $medicalStaff->user->name ?? 'N/A') }}" readonly>
                                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                                </div>
                            </div>
                            {{-- user_id end --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Create equipment form end --}}
    </div>
</x-app-layout>

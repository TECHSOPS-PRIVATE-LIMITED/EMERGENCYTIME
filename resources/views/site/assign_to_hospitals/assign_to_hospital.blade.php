<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{-- Breadcrumb end --}}

{{-- error start --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- error end  --}}

        {{-- BEGIN: Step Form Horizontal --}}
        <div class="space-y-6">
            <div class="wizard card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Creating Facility') }}</h4>
                </div>
                <div class="card-body p-6">
                    <div class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                        <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step"
                             data-step="1">
                            <div class="number-box">
                                <span class="number"> 1 </span>
                                <span class="no-icon text-3xl">
                                    <iconify-icon icon="bx:check-double"></iconify-icon>
                                </span>
                            </div>
                            <div class="bar-line"></div>
                            <div class="circle-box">
                                <span class="w-max">{{ __('Facility Details') }}</span>
                            </div>
                        </div>

                        <div class="  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step"
                             data-step="1">
                            <div class="number-box">
                                <span class="number">
                                    2
                                </span>
                                <span class="no-icon text-3xl">
                                    <iconify-icon icon="bx:check-double"></iconify-icon>
                                </span>
                            </div>
                            <div class="bar-line"></div>
                            <div class="circle-box">
                                <span class="w-max">{{ __('Medical Staffs') }}</span>
                            </div>
                        </div>

                        <div class="  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step"
                             data-step="1">
                            <div class="number-box">
                                <span class="number">
                                    3
                                </span>
                                <span class="no-icon text-3xl">
                                    <iconify-icon icon="bx:check-double"></iconify-icon>
                                </span>
                            </div>
                            <div class="bar-line"></div>
                            <div class="circle-box">
                                <span class="w-max">{{ __('Treatments') }}</span>
                            </div>
                        </div>

                        <div class="  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step"
                             data-step="1">
                            <div class="number-box">
                                <span class="number">
                                    4
                                </span>
                                <span class="no-icon text-3xl">
                                    <iconify-icon icon="bx:check-double"></iconify-icon>
                                </span>
                            </div>
                            <div class="bar-line"></div>
                            <div class="circle-box">
                                <span class="w-max">Equipments</span>
                            </div>
                        </div>
                    </div>
                    <form class="wizard-form mt-10" method="POST" action="{{ route('assign.to.facility.store', $facility->id) }}"
                          enctype="multipart/form-data">
                        @csrf

                        <!-- Hidden inputs to send IDs -->
                        <input type="hidden" name="facility_id" value="{{ $facility->id }}">

                        {{-- start of facility --}}
                        <div class="wizard-form-step active" data-step="1">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1 mt-5">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">{{ __('') }}
                                    </h4>
                                </div>

                                {{-- type --}}
                                <div class="input-area">
                                    <label for="name" class="form-label">{{ __('Name') }} <span
                                            class="text-red-500">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="Enter Facility Name" value="{{ old('name', $facility->name) }}"
                                           required readonly>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>

                                {{-- name --}}
                                <div class="input-area">
                                    <label for="name" class="form-label">{{ __('Type') }} <span
                                            class="text-red-500">*</span></label>
                                    <input id="type" name="type" type="text" class="form-control"
                                           placeholder="Enter Type" value="{{ old('name', $facility->type) }}" required
                                           readonly>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                </div>

                                {{-- email --}}
                                <div class="input-area">
                                    <label for="email" class="form-label">{{ __('Email') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="email" type="email" class="form-control"
                                           value="{{ old('email', $facility->email) }}" required readonly>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>

                                {{-- phone number start --}}
                                <div class="input-area">
                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="phone_number" name="phone_number" type="text" class="form-control"
                                           placeholder="1234567890" minlength="10" maxlength="10"
                                           value="{{ old('phone_number', $facility->phone_number) }}" readonly>
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                                </div>

                                {{--  number_of_beds --}}
                                <div class="input-area">
                                    <label for="number_of_beds" class="form-label">{{ __('Number of Beds') }}</label>
                                    <input id="number_of_beds" name="number_of_beds" type="text"
                                           class="form-control" placeholder="Number of Beds"
                                           value="{{ old('number_of_beds', $facility->number_of_beds ?? 'N/A') }}"
                                           readonly>
                                    <x-input-error :messages="$errors->get('number_of_beds')" class="mt-2"/>
                                </div>

                                {{--  hipaa_status --}}
                                <div class="input-area">
                                    <label for="hipaa_status" class="form-label">{{ __('Hipaa Status') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="hipaa_status" name="hipaa_status" type="text" class="form-control"
                                           placeholder="1234567890" minlength="10" maxlength="10"
                                           value="{{ old('hipaa_status', $facility->hipaa_status) }}" readonly>
                                    <x-input-error :messages="$errors->get('hipaa_status')" class="mt-2"/>
                                </div>

                                {{-- city --}}
                                <div class="input-area">
                                    <label for="city" class="form-label">{{ __('City') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="city" name="city" type="text" class="form-control"
                                           placeholder="City" value="{{ old('city', $facility->city) }}" readonly>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                                </div>

                                {{--  state --}}
                                <div class="input-area">
                                    <label for="state" class="form-label">{{ __('State') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="state" name="state" type="text" class="form-control"
                                           placeholder="State" value="{{ old('state', $facility->state) }}" readonly>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2"/>
                                </div>

                                {{-- country --}}
                                <div class="input-area">
                                    <label for="country_id" class="form-label">{{ __('Country Code') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="country_id" name="country_id" type="text" class="form-control"
                                           value="{{ old('country_id', optional($facility->country)->name) }}" readonly>
                                    <x-input-error :messages="$errors->get('country_id')" class="mt-2"/>
                                </div>


                                {{-- postal_code --}}
                                <div class="input-area">
                                    <label for="postal_code" class="form-label">{{ __('Postal Code') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="postal_code" name="postal_code" type="text" class="form-control"
                                           placeholder="Postal Code"
                                           value="{{ old('postal_code', $facility->postal_code) }}" readonly>
                                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                                </div>

                                {{-- opening_hours --}}
                                <div class="input-area">
                                    <label for="opening_hours"
                                           class="form-label">{{ __('Opening Date & Time') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="opening_hours" name="opening_hours" type="time"
                                           class="form-control"
                                           value="{{ old('opening_hours', $facility->opening_hours) }}" required
                                           readonly>
                                    <x-input-error :messages="$errors->get('opening_hours')" class="mt-2"/>
                                </div>

                                {{-- closing hours --}}
                                <div class="input-area">
                                    <label for="closing_hours"
                                           class="form-label">{{ __('Close Date & Time') }}</label>
                                    <input id="closing_hours" name="closing_hours" type="time"
                                           class="form-control"
                                           value="{{ old('closing_hours', $facility->closing_hours ?? 'N/A') }}"
                                           readonly>
                                    <x-input-error :messages="$errors->get('closing_hours')" class="mt-2"/>
                                </div>

                                {{-- emergency_contact --}}
                                <div class="input-area">
                                    <label for="emergency_contact"
                                           class="form-label">{{ __('Emergency Contact') }}</label>
                                    <input id="emergency_contact" name="emergency_contact" type="text"
                                           class="form-control"
                                           value="{{ old('emergency_contact', $facility->emergency_contact ?? 'N/A') }}"
                                           minlength="11" maxlength="15" readonly>
                                </div>

                                {{-- website --}}
                                <div class="input-area">
                                    <label for="website" class="form-label">{{ __('website') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="website" name="website" type="text" class="form-control"
                                           value="{{ old('website', $facility->website ?? 'N/A') }}" readonly>
                                </div>

                                {{--  longitude --}}
                                <div class="input-area">
                                    <label for="longitude" class="form-label">{{ __('Longitude') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="longitude" name="longitude" type="text" class="form-control"
                                           value="{{ old('longitude', $facility->longitude ?? 'N/A') }}" readonly>
                                    <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
                                </div>

                                {{--  latitude --}}
                                <div class="input-area">
                                    <label for="latitude" class="form-label">{{ __('Latitude') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="latitude" name="latitude" type="text" class="form-control"
                                           value="{{ old('latitude', $facility->latitude ?? 'N/A') }}" readonly>
                                    <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
                                </div>

                                {{--  address --}}
                                <div class="input-area">
                                    <label for="address" class="form-label">{{ __('Address') }}<span
                                            class="text-red-500">*</span></label>
                                    <textarea id="address" name="address" type="text" class="form-control"
                                              placeholder="address" rows="4"
                                              readonly>{{ old('address', $facility->address ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        {{-- end of facility --}}

                        {{-- medical staff start --}}
                        <div class="wizard-form-step" data-step="2">
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto divide-y divide-gray-200 my-10">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Select
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            License Number
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Gender
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Specialty
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($medicalStaffs as $staff)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="checkbox" name="staff_ids[]"
                                                       value="{{ $staff->id }}"
                                                       class="form-checkbox h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                       @if($facility->medicalStaffs->contains($staff->id)) checked @endif>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $staff->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $staff->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $staff->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $staff->medical_license_number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $staff->gender }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <ul>
                                                    @foreach ($staff->specialties as $specialty)
                                                        <li>{{ $specialty->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-red-500">No Staff Available
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- medical staff end --}}


                        {{--  treatment start --}}
                        <div class="wizard-form-step" data-step="3">
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto divide-y divide-gray-200 my-10">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Select
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Disease Name
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($treatments as $treatment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="checkbox" name="treatment_ids[]"
                                                       value="{{ $treatment->id }}"
                                                       class="form-checkbox h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                       @if($facility->treatments->contains($staff->id)) checked @endif>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $treatment->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $treatment->category->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $treatment->disease_name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-red-500">No Staff Available
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--  treatment end --}}

                        {{-- equipments start --}}
                        <div class="wizard-form-step" data-step="4">
                            <div class="overflow-x-auto">
                                <table class="w-full table-auto divide-y divide-gray-200 my-10">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Select
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Last Maintenance Date
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs md:text-sm lg:text-base font-medium text-gray-500 uppercase tracking-wider">
                                            Image
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($equipments as $equipment)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <input type="checkbox" name="equipment_ids[]"
                                                       value="{{ $equipment->id }}"
                                                       class="form-checkbox h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                       @if($facility->equipments->contains($staff->id)) checked @endif>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $equipment->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $equipment->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $equipment->last_maintenance_date ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <img src="{{ $equipment->image }}" alt="Equipment Image"
                                                     class="max-w-xs max-h-xs"
                                                     style="max-width: 100px; max-height: 100px;">
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-red-500">No Staff Available
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- equipments end --}}

                        <div class="mt-6 space-x-3">
                            <button id="prev-button" class="btn btn-dark" type="button">Prev</button>
                            <button id="next-button" class="btn btn-dark" type="button">Next</button>
                            <button id="save-button" class="btn btn-dark" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Step Form Horizontal -->
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let currentStep = 1;

                // Get all steps and step indicators
                const steps = document.querySelectorAll(".wizard-form-step");
                const stepIndicators = document.querySelectorAll(".wizard-step");

                // Get buttons by ID
                const nextButton = document.getElementById("next-button");
                const prevButton = document.getElementById("prev-button");
                const saveButton = document.getElementById("save-button");

                const totalSteps = steps.length; // Ensure the correct total count of steps

                // Function to update visible step
                function updateStep() {
                    // Hide all steps and set them as inactive
                    steps.forEach((step) => {
                        step.classList.remove("active");
                    });

                    // Show the current step
                    const activeStep = document.querySelector(`.wizard-form-step[data-step="${currentStep}"]`);
                    activeStep.classList.add("active");

                    // Update step indicators to reflect the current step
                    updateStepIndicators();

                    // Update button visibility based on the current step
                    updateButtonVisibility();
                }

                // Function to update step indicators
                function updateStepIndicators() {
                    stepIndicators.forEach((indicator, index) => {
                        indicator.classList.remove("active");
                        indicator.classList.remove("pass");

                        const numberBox = indicator.querySelector(".number-box .number");
                        const iconBox = indicator.querySelector(".number-box .no-icon");

                        // Reset the step number display
                        numberBox.style.display = "block";
                        iconBox.style.display = "none";
                        numberBox.innerText = (index + 1).toString();
                    });

                    // Mark all steps before the current one as completed
                    for (let i = 0; i < currentStep - 1; i++) {
                        stepIndicators[i].classList.add("pass");

                        const numberBox = stepIndicators[i].querySelector(".number-box .number");
                        const iconBox = stepIndicators[i].querySelector(".number-box .no-icon");

                        // Hide the number, show the check icon
                        numberBox.style.display = "none";
                        iconBox.style.display = "block";
                    }

                    // Mark the current step as active
                    stepIndicators[currentStep - 1].classList.add("active");
                }

                function updateButtonVisibility() {
                    if (currentStep === 1) {
                        prevButton.classList.add("hidden");
                        nextButton.classList.remove("hidden");
                        saveButton.classList.add("hidden");
                    } else if (currentStep === totalSteps) {
                        prevButton.classList.remove("hidden");
                        nextButton.classList.add("hidden");
                        saveButton.classList.remove("hidden");
                    } else {
                        prevButton.classList.remove("hidden");
                        nextButton.classList.remove("hidden");
                        saveButton.classList.add("hidden");
                    }
                }

                nextButton.addEventListener("click", function () {
                    if (currentStep < totalSteps) {
                        currentStep++;
                        updateStep();
                    }
                });

                prevButton.addEventListener("click", function () {
                    if (currentStep > 1) {
                        currentStep--;
                        updateStep();
                    }
                });

                updateStep();
            });

        </script>
    @endpush
</x-app-layout>

<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        {{-- BEGIN: Step Form Horizontal --}}
        <div class="space-y-6">
            <div class="wizard card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Creating Facility') }}</h4>
                </div>
                <div class="card-body p-6">
                    <div class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                        <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step" data-step="1">
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
                                last:flex-none group wizard-step" data-step="1">
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
                                <span class="w-max">{{ __('Medical Staff') }}</span>
                            </div>
                        </div>

                        <div class="  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step" data-step="1">
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
                                <span class="w-max">{{ __('Treatment') }}</span>
                            </div>
                        </div>

                        <div class="  relative z-[1] items-center item flex flex-start flex-1
                                last:flex-none group wizard-step" data-step="1">
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
                                <span class="w-max">Submit</span>
                            </div>
                        </div>

                    </div>
                    <form class="wizard-form mt-10" method="POST" action="{{ route('assign.to.facility.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        {{-- start of facility --}}
                        <div class="wizard-form-step active" data-step="1">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1 mt-5">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">{{ __('') }}</h4>
                                </div>

                                {{-- name --}}
                                <div class="input-area">
                                    <label for="name" class="form-label">{{ __('Name') }} <span
                                            class="text-red-500">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           placeholder="Enter Facility Name" value="{{ old('name') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>

                                {{-- type --}}
                                <div class="input-area">
                                    <label for="type" class="form-label">{{ __('Type') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="">{{ __('Select Facility Type') }}</option>
                                        <option value="hospital">{{ __('Hospital') }}</option>
                                        <option value="clinic">{{ __('Clinic') }}</option>
                                        <option value="consultancy">{{ __('Consultancy') }}</option>
                                        <option value="daycare">{{ __('Daycare') }}</option>
                                        <option value="lab">{{ __('Lab') }}</option>
                                        <option value="diagnostic">{{ __('Diagnostic') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                </div>

                                {{-- email --}}
                                <div class="input-area">
                                    <label for="email" class="form-label">{{ __('Email') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="email" type="email" class="form-control" placeholder="Enter Your Email"
                                           value="{{ old('email') }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>

                                {{-- country number --}}
                                <div class="input-area">
                                    <label for="country_code" class="form-label">{{ __('Country Code') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="country_code" name="country_code" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->code }}">{{ $country->code }} {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- phone number start --}}
                                <div class="input-area">
                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="phone_number" name="phone_number" type="text" class="form-control"
                                           placeholder="1234567890"
                                           minlength="10" maxlength="10" value="{{ old('phone_number') }}" required>
                                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                                </div>

                                {{--  number_of_beds --}}
                                <div class="input-area">
                                    <label for="number_of_beds" class="form-label">{{ __('Number of Beds') }}</label>
                                    <input id="number_of_beds" name="number_of_beds" type="text" class="form-control"
                                           placeholder="Number of Beds"
                                           value="{{ old('number_of_beds') }}">
                                    <x-input-error :messages="$errors->get('number_of_beds')" class="mt-2"/>
                                </div>

                                {{--  hipaa_status --}}
                                <div class="input-area">
                                    <label for="hipaa_status" class="form-label">{{ __('Hipaa Status') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="hipaa_status" name="hipaa_status" class="form-control">
                                        <option value="">{{ __('Select Hippa Status') }}</option>
                                        <option value="yes">{{ __('Yes') }}</option>
                                        <option value="no">{{ __('No') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('hipaa_status')" class="mt-2"/>
                                </div>


                                {{-- city --}}
                                <div class="input-area">
                                    <label for="city" class="form-label">{{ __('City') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="city" name="city" type="text" class="form-control" placeholder="City"
                                           value="{{ old('city') }}" required>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                                </div>

                                {{--  state --}}
                                <div class="input-area">
                                    <label for="state" class="form-label">{{ __('State') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="state" name="state" type="text" class="form-control" placeholder="State"
                                           value="{{ old('state') }}" required>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2"/>

                                </div>

                                {{--  country --}}
                                <div class="input-area">
                                    <label for="country_code" class="form-label">{{ __('Country Code') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="country_code" name="country_code" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->code }}">{{ $country->code }} {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- postal_code --}}
                                <div class="input-area">
                                    <label for="postal_code" class="form-label">{{ __('Postal Code') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="postal_code" name="postal_code" type="text" class="form-control"
                                           placeholder="Postal Code"
                                           value="{{ old('postal_code') }}" required>
                                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                                </div>

                                {{-- opening_hours--}}
                                <div class="input-area">
                                    <label for="opening_hours" class="form-label">{{ __('Opening Date & Time') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="opening_hours" name="opening_hours" type="time" class="form-control">
                                    <x-input-error :messages="$errors->get('opening_hours')" class="mt-2"/>
                                </div>

                                {{-- closing hours --}}
                                <div class="input-area">
                                    <label for="closing_hours" class="form-label">{{ __('Close Date & Time') }}</label>
                                    <input id="closing_hours" name="closing_hours" type="time" class="form-control">
                                    <x-input-error :messages="$errors->get('closing_hours')" class="mt-2"/>
                                </div>

                                {{-- emergency_contact --}}
                                <div class="input-area">
                                    <label for="emergency_contact"
                                           class="form-label">{{ __('Emergency Contact') }}</label>
                                    <input id="emergency_contact" name="emergency_contact" type="text"
                                           class="form-control"
                                           placeholder="Emergency Contact No" minlength="11" maxlength="15">
                                </div>

                                {{-- website --}}
                                <div class="input-area">
                                    <label for="website" class="form-label">{{ __('website') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="website" name="website" type="text" class="form-control"
                                           placeholder="Enter Website URL : https://www.emergencytime.com">
                                </div>

                                {{--  address --}}
                                <div class="input-area">
                                    <label for="address" class="form-label">{{ __('Address') }}<span
                                            class="text-red-500">*</span></label>
                                    <textarea id="address" name="address" type="text" class="form-control"
                                              placeholder="address" rows="4"></textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        {{-- end of facility --}}

                        {{--medical staff start--}}
                        <div class="wizard-form-step" data-step="2">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1 mb-5">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">
                                    </h4>
                                </div>
                                {{-- Name start --}}
                                <div class="input-area">
                                    <label for="name" class="form-label">{{ __('Name') }}<span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" id="name" name="name" class="form-control"
                                               placeholder="Enter equipment name"
                                               value="{{ old('name') }}" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                    </div>
                                </div>
                                {{-- Name end --}}

                                {{-- Role start --}}
                                <div class="input-area">
                                    <label for="role" class="form-label">{{ __('Role') }}<span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" id="role" name="role" class="form-control"
                                               placeholder="Enter your role"
                                               value="{{ old('role') }}">
                                        <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                                    </div>
                                </div>
                                {{-- Role end --}}

                                {{-- Image start --}}
                                <div class="input-area">
                                    <label for="image" class="form-label">{{ __('Equipment Image') }}</label>
                                    <div class="relative">
                                        <input type="file" id="image" name="image" class="form-control"
                                               placeholder="Upload image" accept="image/*">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                        {{-- Image preview --}}
                                        <div id="image-preview-container" style="margin-top: 10px;">
                                            <img id="image-preview" src="" alt="Image Preview"
                                                 style="display: none; width: 100px; height: 100px; object-fit: cover;"/>
                                        </div>
                                    </div>
                                </div>
                                {{-- Image end --}}

                                {{--  specialty select start --}}
                                <div class="input-area">
                                    <label for="country_code" class="form-label">{{ __('Specialty') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="country_code" name="country_code" class="form-control" required>
                                        <option value="" selected disabled> Select Specialty</option>
                                        @foreach($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--  specialty select end --}}

                                {{-- Description start --}}
                                <div class="input-area">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <div class="relative">
                <textarea type="text" id="description" name="description" class="form-control"
                          placeholder="Enter equipment description">{{ old('description') }}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                    </div>
                                </div>
                                {{-- Description end --}}

                            </div>
                        </div>
                        {{--medical staff end--}}

                        {{--  treatment start --}}
                        <div class="wizard-form-step" data-step="3">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Treatment</h4>
                                </div>

                                <!-- Name Field -->
                                <div class="input-area">
                                    <label for="name" class="form-label">{{ __('Name') }}<span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" id="name" name="name" class="form-control"
                                               placeholder="Enter equipment name"
                                               value="{{ old('name') }}" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                    </div>
                                </div>
                                <!-- Name end -->

                                <!-- Category Name Field -->
                                <div class="input-area">
                                    <label for="category_name" class="form-label">{{ __('Category Name') }}<span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" id="category_name" name="category_name" class="form-control"
                                               placeholder="Enter category name e.g: Bone"
                                               value="{{ old('category_name') }}" required>
                                        <x-input-error :messages="$errors->get('category_name')" class="mt-2"/>
                                    </div>
                                </div>
                                <!-- Category Name end -->

                                <!-- Disease Name Field -->
                                <div class="input-area">
                                    <label for="disease_name" class="form-label">{{ __('Disease Name') }}<span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" id="disease_name" name="disease_name" class="form-control"
                                               placeholder="Enter disease name e.g: Flu"
                                               value="{{ old('disease_name') }}" required>
                                        <x-input-error :messages="$errors->get('disease_name')" class="mt-2"/>
                                    </div>
                                </div>
                                <!-- Disease Name end -->

                                <!-- Description Field -->
                                <div class="input-area">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>
                                    <div class="relative">
        <textarea id="description" name="description" class="form-control"
                  placeholder="Enter equipment description">{{ old('description') }}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                    </div>
                                </div>
                                <!-- Description end -->
                            </div>
                        </div>
                        {{--  treatment end --}}

                        {{-- submit start --}}
                        <div class="wizard-form-step" data-step="4">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6"></h4>
                                </div>


                            </div>
                        </div>
                        {{-- submit end --}}

                        <div class="mt-6 space-x-3">
                            <button id="prev-button" class="btn btn-dark" type="button">Prev</button>
                            <button id="next-button" class="btn btn-dark" type="button">Next</button>
                            <button id="save-button" class="btn btn-dark" type="button">Save</button>
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

                // Function to update button visibility based on the current step
                function updateButtonVisibility() {
                    if (currentStep === 1) {
                        prevButton.classList.add("hidden"); // Hide "prev" on the first step
                        nextButton.classList.remove("hidden"); // Show "next"
                        saveButton.classList.add("hidden"); // Hide "save"
                    } else if (currentStep === totalSteps) {
                        prevButton.classList.remove("hidden"); // Show "prev"
                        nextButton.classList.add("hidden"); // Hide "next"
                        saveButton.classList.remove("hidden"); // Show "save"
                    } else {
                        prevButton.classList.remove("hidden"); // Show "prev"
                        nextButton.classList.remove("hidden"); // Show "next"
                        saveButton.classList.add("hidden"); // Hide "save"
                    }
                }

                // Event listener for the "next" button
                nextButton.addEventListener("click", function () {
                    if (currentStep < totalSteps) {
                        currentStep++; // Increment step
                        updateStep(); // Update visible step
                    }
                });

                // Event listener for the "previous" button
                prevButton.addEventListener("click", function () {
                    if (currentStep > 1) {
                        currentStep--; // Decrement step
                        updateStep(); // Update visible step
                    }
                });

                // Initialize the first step and set button visibility
                updateStep(); // Display the correct initial step
            });

            // image preview for medical staff
            document.addEventListener("DOMContentLoaded", function () {
                // Preview image before uploading
                const imageInput = document.getElementById('image');
                const imagePreview = document.getElementById('image-preview');

                imageInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.setAttribute('src', e.target.result);
                            imagePreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.setAttribute('src', '');
                        imagePreview.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>

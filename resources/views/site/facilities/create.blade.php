<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        {{-- BEGIN: Step Form --}}
        <div class="space-y-6">
            <div class="wizard card">

                <div class="card-body p-6">

                    <form class="wizard-form" method="POST" action="{{ route('facilities.store') }}">
                        @csrf
                        {{-- start of facility --}}
                        <div class="wizard-form-step active" data-step="1">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                    <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">
                                        <strong>
                                            {{ __('Enter Your Facility Details') }}
                                        </strong>
                                    </h4>
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
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter Your Email"
                                           value="{{ old('email') }}" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>

                                {{--  phone number --}}
                                <div class="input-area">
                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}<span
                                            class="text-red-500">*</span></label>
                                    <input id="phone_number" name="phone_number" type="text" class="form-control"
                                           placeholder="2887385893" minlength="10" maxlength="10" required value="{{ old('phone_number') }}">
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
                                    <label for="country_id" class="form-label">{{ __('Country') }}<span
                                            class="text-red-500">*</span></label>
                                    <select id="country_id" name="country_id" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->id }}">{{ $country->name }}</option>
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
                                    <input id="opening_hours" name="opening_hours" type="time" class="form-control" value="{{ old('opening_hours') }}">
                                    <x-input-error :messages="$errors->get('opening_hours')" class="mt-2"/>
                                </div>

                                {{-- closing hours --}}
                                <div class="input-area">
                                    <label for="closing_hours" class="form-label">{{ __('Close Date & Time') }}</label>
                                    <input id="closing_hours" name="closing_hours" type="time" class="form-control" value="{{ old('closing_hours') }}">
                                    <x-input-error :messages="$errors->get('closing_hours')" class="mt-2"/>
                                </div>

                                {{-- emergency_contact --}}
                                <div class="input-area">
                                    <label for="emergency_contact"
                                           class="form-label">{{ __('Emergency Contact') }}</label>
                                    <input id="emergency_contact" name="emergency_contact" type="text"
                                           class="form-control"
                                           placeholder="Emergency Contact No." minlength="11" maxlength="15" value="{{ old('emergency_contact') }}">
                                </div>

                                {{-- website --}}
                                <div class="input-area">
                                    <label for="website" class="form-label">{{ __('website') }}</label>
                                    <input id="website" name="website" type="text" class="form-control"
                                           placeholder="Enter Website URL : https://www.emergencytime.com" value="{{ old('website') }}">
                                    <x-input-error :messages="$errors->get('website')" class="mt-2"/>

                                </div>

                                {{-- Address --}}
                                <div class="input-area">
                                    <label for="address" class="form-label">{{ __('Address') }}<span class="text-red-500">*</span></label>
                                    <textarea id="address" name="address" class="form-control"
                                              placeholder="Enter Address" rows="4" required>{{ old('address') }}</textarea>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>

                                {{-- longitude --}}
                                <div class="input-area">
                                    <label for="longitude" class="form-label">{{ __('Longitude') }}<span class="text-red-500">*</span></label>
                                    <input type="text" id="longitude" name="longitude" class="form-control"
                                              placeholder="Enter longitude" >{{ old('longitude') }}
                                    <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
                                </div>

                                {{-- latitude --}}
                                <div class="input-area">
                                    <label for="latitude" class="form-label">{{ __('Latitude') }}</label>
                                    <input id="latitude" name="latitude" type="text" class="form-control"
                                           placeholder="Enter latitude " value="{{ old('latitude') }}">
                                    <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
                                </div>

                            </div>
                        </div>
                        {{-- end of facility --}}


                        {{-- save --}}
                        <div class="mt-6 flex justify-center">
                            <button type="submit"
                                    class="btn inline-flex justify-center btn-dark mt-4 md:w-[70%] w-full">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- END: Step Form --}}
    </div>
</x-app-layout>

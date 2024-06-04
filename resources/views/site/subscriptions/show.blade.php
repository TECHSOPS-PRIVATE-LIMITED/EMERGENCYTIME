<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        {{--Create subscription form start--}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-6">
                            {{-- Plan Type --}}
                            <div class="input-area">
                                <label for="plan_type" class="form-label">{{ __('Plan Type') }}</label>
                                <input type="text" id="plan_type" name="plan_type" class="form-control"
                                       value="{{ old('plan_type', $subscription->plan_type ?? 'basic') }}" readonly>

                            </div>

                            {{-- User ID --}}
                            <div class="input-area">
                                <label for="user_id" class="form-label">{{ __('User ID') }}</label>
                                <input type="text" id="user_id" name="user_id" class="form-control"
                                       value="{{ old('user_id', $subscription->user->name ?? 'N/A') }}" readonly>

                            </div>

                            {{-- Start Date --}}
                            <div class="input-area">
                                <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
                                <input type="text" id="start_date" name="start_date" class="form-control"
                                       value="{{ old('start_date', $subscription->start_date ?? 'N/A') }}" readonly>

                            </div>

                            {{-- End Date --}}
                            <div class="input-area">
                                <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                                <input type="text" id="end_date" name="end_date" class="form-control"
                                       value="{{ old('end_date', $subscription->end_date ?? 'N/A') }}" readonly>

                            </div>

                            {{-- Auto Renew --}}
                            <div class="input-area">
                                <label for="auto_renew" class="form-label">{{ __('Auto Renew') }}</label>
                                <input type="text" id="auto_renew" name="auto_renew" class="form-control"
                                       value="{{ old('auto_renew', $subscription->auto_renew ? 'Yes' : 'No') }}" readonly>

                            </div>

                            {{-- Price --}}
                            <div class="input-area">
                                <label for="price" class="form-label">{{ __('Price') }}</label>
                                <input type="text" id="price" name="price" class="form-control"
                                       value="{{ old('price', $subscription->price ?? 'N/A') }}" readonly>

                            </div>

                            {{-- Status --}}
                            <div class="input-area">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <input type="text" id="status" name="status" class="form-control"
                                       value="{{ old('status', $subscription->status ?? 'inactive') }}" readonly>

                            </div>

                            {{-- Canceled At --}}
                            <div class="input-area">
                                <label for="canceled_at" class="form-label">{{ __('Canceled At') }}</label>
                                <input type="text" id="canceled_at" name="canceled_at" class="form-control"
                                       value="{{ old('canceled_at', $subscription->canceled_at ?? 'N/A') }}" readonly>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Create subscription form end--}}
    </div>
</x-app-layout>

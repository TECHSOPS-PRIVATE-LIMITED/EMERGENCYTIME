<x-guest-layout>
    <div class="flex flex-col justify-center h-full auth-box">
        <div class="flex justify-center mb-6 text-center mobile-logo lg:hidden">
            <div class="inline-flex items-center justify-center mb-10">
                <x-application-logo />
                <span class="text-xl font-bold ltr:ml-3 rtl:mr-3 font-Inter text-slate-900 dark:text-white">Emergency Time</span>
            </div>
        </div>
        <div class="relative flex-col items-center justify-center py-8 sm:flex sm:py-10 lg:py-0">
            <div class="w-full px-4 sms:px-0 sm:w-[450px]">
                <div class="text-center">
                    <h4 class="font-medium">
                        {{ __('Verify Your Email Address') }}
                    </h4>
                    <p class="text-base font-light text-textColor">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>

                    @if (session('status') == 'verification-link-sent')
                    <p class="mt-5 text-base font-bold text-black text-indigo-500">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full px-3 py-3 mt-8 text-base font-medium text-white transition-all duration-500 rounded-md bg-slate-900 hover:bg-slate-800 dark:text-white">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

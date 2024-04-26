<div id="pricing" class="pricing-section section pb-80">
    <div class="imagebg">
        <img src="{{ asset('site/images/pricing-bg.jpg') }}" alt="pricing-bg">
    </div>
    <div class="gradiant-background gradiant-overlay gradiant-light"></div><!-- .gradiant-background  /exta div for transparent gradiant overlay /  -->
    <div class="container tab-fix">
        <div class="section-head heading-light text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading heading-light">Choose your Subscription</h2>
                    <p>Subscribe to Emergency Time for uninterrupted access to life-saving features and resources, ensuring you're always prepared for emergencies.</p>
                </div>
            </div>
        </div><!-- .col -->
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-box pricing-box-curbed wow fadeIn" data-wow-duration="1s">
                        <div class="pricing-top gradiant-background">
                            <h5>Basic Plan</h5>
                            <h2>FREE</h2>
                        </div>
                        <div class="pricing-bottom">
                            <ul class="text-left">
                                <li><em class="ti ti-check"></em>Basic Emergency Guideness</li>
                                <li><em class="ti ti-close"></em>Hospital Connections</li>
                                <li><em class="ti ti-close"></em>Appointment Booking</li>
                                <li><em class="ti ti-close"></em>Medical History</li>
                                <li><em class="ti ti-close"></em>Email Notifications</li>
                                <li><em class="ti ti-close"></em>First Aid Tips</li>
                                <li><em class="ti ti-close"></em>Appointment Reminders</li>
                            </ul>
                            @if(Auth::check())
                                <a href="{{ route('stripe') }}" class="button button-uppercase">{{ __('Buy Subscription') }}</a>
                            @else
                                <a href="{{ route('login') }}" class="button button-uppercase">{{ __('Login to Buy') }}</a>
                            @endif
                        </div>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-box pricing-box-curbed wow fadeIn" data-wow-duration="1s">
                        <div class="pricing-top gradiant-background">
                            <h5>Premium plan</h5>
                            <h2>$5/mo</h2>
                        </div>
                        <div class="pricing-bottom">
                            <ul class="text-left">
                                <li><em class="ti ti-check"></em>Basic Emergency Guideness</li>
                                <li><em class="ti ti-check"></em>Hospital Connections</li>
                                <li><em class="ti ti-check"></em>Appointment Booking</li>
                                <li><em class="ti ti-check"></em>Medical History</li>
                                <li><em class="ti ti-check"></em>Email Notifications</li>
                                <li><em class="ti ti-check"></em>First Aid Tips</li>
                                <li><em class="ti ti-check"></em>Appointment Reminders</li>
                            </ul>
                            @if(Auth::check())
                                <a href="{{ route('stripe') }}" class="button button-uppercase">{{ __('Buy Subscription') }}</a>
                            @else
                                <a href="{{ route('login') }}" class="button button-uppercase">{{ __('Login to Buy') }}</a>
                            @endif
                        </div>
                    </div>
                </div><!-- .col  -->
            </div><!-- .row -->
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
			rel="stylesheet"
		/>
            <title>Payment | Emergency Time</title>
    <link rel="stylesheet" href="{{ asset('site/assets/css/payment-form.css') }}">
</head>
<body>
<div class="card">
    <div class="card__header">
        <img src="{{ asset('images/logo.png') }}" class="logo" width="70" height="70" />
        {{-- <h1>Payment information</h1> --}}
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <form role="form" action="{{ route('stripe.post') }}" method="post" id="payment-form">
        @csrf
        <div class="form-group">
            <label for="full-name">Full Name</label>
            <input class="full-name empty" type="text" id="full-name" aria-label="Full Name"
                   placeholder="Alex Montoya" required/>
        </div>

        <div class="icon-group-container">
            <label for="card-number">Card Number</label>
            <div class="icon-group empty">
                <input type="text" id="card-number" aria-label="Card Number" class="empty"
                       placeholder="1234 1234 1234 1234" required/>
                <img id="card-icon" src="{{ asset('site/assets/icons/credit-card.png') }}" height="14" width="14"/>
            </div>
        </div>

        <div class="row-group">
            <div class="form-group">
                <label for="expiration">Expiration Date</label>
                <input class="expiration-input empty" type="tel" id="expiration" minlength="5" maxlength="5"
                        placeholder="MM/YY" required/>
            </div>
            <div class="icon-group-container">
                <label for="cvv">CVV</label>
                <div class="icon-group empty">
                    <input class="cvv-input empty" type="tel" maxlength="3" placeholder="···" id="cvv" required/>
                    <img id="info-icon" src="{{ asset('images/result-not-found.svg') }}" height="14" width="14"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cardholder-name">Address</label>
            <input type="text" id="address" class="empty" aria-label="adress" placeholder="Av. Morelos 123"
                   required/>
        </div>
        <div id="error-message"></div>
        <button id="submit-button" type="submit">Confirm payment</button>
    </form>
    <div class="verify-info">
        <small>Verify the information is correct</small>
    </div>
</div>
<script src="https://js.stripe.com/v2/"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="{{ asset('site/assets/js/payment-form.js') }}" defer></script>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');

    document.getElementById('payment-form').addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken('card', {
            name: document.getElementById('full-name').value,
            address_line1: document.getElementById('address').value,
            address_city: 'City', // Update with city name
            address_state: 'State', // Update with state name
            address_zip: '12345', // Update with zip code
        }).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('error-message');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
</body>
</html>

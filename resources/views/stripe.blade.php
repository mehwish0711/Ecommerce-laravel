@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Stripe Payment</h2>

    @if(Session::has('success'))
        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form 
                id="payment-form"
                role="form"
                action="{{ route('stripe.post') }}"
                method="POST"
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ config('services.stripe.key') }}"
            >
                @csrf

                <input type="hidden" name="bill" value="{{ $bill }}">
                <input type="hidden" name="full_name" value="{{ $full_name }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="phone" value="{{ $phone }}">

                <div class="form-group required">
                    <label>Name on Card</label>
                    <input class="form-control" type="text" required>
                </div>

                <div class="form-group required">
                    <label>Card Number</label>
                    <input class="form-control card-number" type="text" autocomplete="off" required>
                </div>

                <div class="form-row d-flex gap-3">
                    <div class="form-group required flex-fill">
                        <label>Expiry Month</label>
                        <input class="form-control card-expiry-month" type="text" required>
                    </div>
                    <div class="form-group required flex-fill">
                        <label>Expiry Year</label>
                        <input class="form-control card-expiry-year" type="text" required>
                    </div>
                    <div class="form-group required flex-fill">
                        <label>CVC</label>
                        <input class="form-control card-cvc" type="text" autocomplete="off" required>
                    </div>
                </div>

                <!-- <div class="error hide mt-3">
                    <div class="alert alert-danger">Please fix the errors and try again.</div>
                </div> -->

                <button class="btn btn-primary btn-block mt-4" type="submit">
                    Pay ${{ $bill ?? 0 }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function () {
    var $form = $(".require-validation");

    $form.on('submit', function (e) {
        var $inputs = $form.find('.required input'),
            $errorMessage = $form.find('div.error'),
            valid = true;

        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');

        $inputs.each(function () {
            if ($(this).val() === '') {
                $(this).closest('.form-group').addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
                valid = false;
            }
        });

        if (!valid) return;

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, function (status, response) {
                if (response.error) {
                    $errorMessage.removeClass('hide').find('.alert').text(response.error.message);
                } else {
                    var token = response.id;
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            });
        }
    });
});
</script>
@endpush

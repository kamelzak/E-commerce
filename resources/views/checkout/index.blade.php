@extends('layouts.master')

@section('page_title')
    Checkout
@endsection

@section('extra-scripts')
    <script src="https://js.stripe.com/v3"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Payment page</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="#" class="my-4">
                    <div id="card-element">
     
                    </div>
     
                    <div id="card-errors" role="alert"></div>
     
                    <button class="btn btn-success mt-4" id="submit">Pay</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        var stripe = Stripe("pk_test_51K06J9Kob7j1X5crvDDwMX5pdpn3xDaOfhsaTR9pRuvNST7q58vwukdNqkoIxM96RUDM9dmRtA5MCXvx0RhX0u3G00geoeUCY6");
        var elements = stripe.elements();
        var style = {
            base : {
            color : "#32325d",
            fontFamily : '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing : "antialiased",
            fontSize : "16px",
            "::placeholder" : {
                color : "#aab7c4"
                }
            },
            invalid : {
                color : "#fa755a",
                iconColor : "#fa755a"
            }
        };
        var card = elements.create("card", { style: style });
        card.mount("#card-element");
        card.addEventListener('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if(error) {
                displayError.classList.add('alert', 'alert-warning');
                displayError.textContent = error.message;
            }
            else {
                displayError.classList.remove('alert', 'alert-warning');
                displayError.textContent = '';
            }
        });
        var submitButton = document.getElementById('submit');

        submitButton.addEventListener('click', function (ev) {
            ev.preventDefault();
            var clientSecret = "pi_3K07YMKob7j1X5cr0IDfFzeQ_secret_TTjPTetWDktkFnQbUAcjJTbiz";
            stripe.confirmCardPayment( clientSecret , {
                payment_method : {
                    card : card
                }
            }).then(function (result) {
                if(result.error){
                    //show error to customer
                    console.log(result.error.message);
                }
                else {
                    //the payment has been processed
                    if(result.paymentIntent.status === 'succeeded') {
                        //Show message to customer
                        console.log(result.paymentIntent);
                    }
                }
            });
        });
    </script>
@endsection
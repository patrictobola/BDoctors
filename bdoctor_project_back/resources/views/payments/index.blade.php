@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach ($sponsors as $sponsor)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">{{ $sponsor->name }}</div>
                            <div class="card-text"> </div>
                            <div class="card-text">€ {{ $sponsor->cost }}</div>
                            <a href="#" class="btn btn-primary">Attiva Sponsor</a>
                            <form id="payment-form" action="index" method="post">
                                @csrf
                                <!-- Putting the empty container you plan to pass to
                                                                      'braintree.dropin.create' inside a form will make layout and flow
                                                                      easier to manage -->
                                <div id="dropin-container"></div>
                                <input type="submit" />
                                <input type="hidden" id="nonce" name="payment_method_nonce" />
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://js.braintreegateway.com/web/3.97.2/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.97.2/js/hosted-fields.min.js"></script>
    <script type="text/javascript">
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: 'sandbox_7b73zbqz_837hcd35nzkx3c3x',
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    // Step four: when the user is ready to complete their
                    //   transaction, use the dropinInstance to get a payment
                    //   method nonce for the user's selected payment method, then add
                    //   it a the hidden field before submitting the complete form to
                    //   a server-side integration
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection

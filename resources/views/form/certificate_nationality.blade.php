@extends('base')


@section('content')
<div>

    <livewire:certificate-form-widget :transaction_id="$transaction_id" />
</div>

@endsection

@push('lscripts')

<script>
    console.log('defined checkout')
    var checkout = function(){
        console.log('call')
        CinetPay.setConfig({
            apikey: '181957851560845e32d579d5.69169291',//   YOUR APIKEY
            site_id: '839589',//YOUR_SITE_ID
            notify_url: "{{ route('cinetpay.notify') }}",
            return_url: "",
            mode: 'PRODUCTION'
        });
        CinetPay.getCheckout({
            transaction_id: "{{ $transaction_id }}", // YOUR TRANSACTION ID
            amount: 100,
            currency: 'XOF',
            channels: 'MOBILE_MONEY',
            description: 'Test de paiement',


        });
        CinetPay.waitResponse(function(data) {
            if (data.status == "REFUSED") {
                if (alert("Votre paiement a échoué")) {
                    Livewire.emit('failed');
                    window.location.reload()
                }
            } else if (data.status == "ACCEPTED") {
                if (alert("Votre paiement a été effectué avec succès")) {

                }
                Livewire.emit('accepted');
            }


        });
        CinetPay.onError(function(data) {
            console.log(data);
        });
    }
</script>
@endpush

@extends('base')

@push('script')
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
@endpush


@section('content')
    <div>
        <livewire:create-demande-form :document="$document" />
    </div>
@endsection

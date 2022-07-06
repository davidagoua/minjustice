@extends('base')


@section('content')


        <div class="page-content-inner">

            <!--Onboarding V1-->
            <div class="onboarding-wrapper onboarding-v1">
                <div class="title-wrap">
                    <p>Documents d'état civil, juridique, social et sanitaire</p>
                    <h2 class="dark-inverted">Veuillez selectionner le type de document souhaité</h2>
                </div>

                <div class="onboarding-wrap">
                    <div class="onboarding-wrap-inner">
                        <!--Card-->
                        @foreach($type_demandes as $type)
                        <div class="onboarding-card">
                            <img class="light-image" src="{{ $type->image }}" alt="">
                            <img class="dark-image" src="{{ $type->image }}" alt="">
                            <div class="onboarding-content">
                                <h3 class="dark-inverted">{{ $type->nom }}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Recte dicis; Ita enim
                                    vivunt.</p>
                                <div class="button-wrap">
                                    <a href="{{ route('demande.type_document', $type) }}" class="button h-button is-primary is-rounded is-elevated">Commencer</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

@endsection

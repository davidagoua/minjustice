<div>

    <div class="page-content-inner">

            <!--Search Results-->
            <div class="search-results-wrapper">

                <div class="search-results-header">



                </div>

                <div class="search-results-body">
                    <div class="columns">


                        <!--Results-->
                        <div class="column is-10">

                            <div id="all-items-tab" class="tab-content is-active">

                                <!--Search Results Group-->
                                <div class="search-results-group">
                                    <div>
                                        <div class="group-header">
                                            <div class="icon-wrap">
                                                <span class="fa fa-file"></span>
                                            </div>
                                            <h4>{{ $typeDemande->nom }}</h4>
                                        </div>

                                        <div>
                                            <div class="control has-icon">
                                                <input wire:model="search" class="input " placeholder="Rechercher un document...">
                                                <div class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="search-results-list">
                                        @forelse($type_documents as $type)
                                            <div class="search-results-item">
                                                <div class="media-flex-center">
                                                    <div class="h-avatar is-medium">
                                                        <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/files/sheet.svg" alt="">
                                                    </div>
                                                    <div class="flex-meta">
                                                        <span>{{ $type->intitule }}</span>
                                                        <span>{{ $typeDemande->nom }}</span>
                                                    </div>
                                                    <div class="flex-end">
                                                        @if($type->url !== "")
                                                        <a class="button h-button is-primary is-raised" href="{{ route($type->url) }}">Choisir</a>
                                                        @else
                                                            <a class="button h-button is-primary is-raised" href="{{ route('demande.create', ['document'=>$type]) }}">Choisir</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                </div>

            </div>

        </div>
</div>

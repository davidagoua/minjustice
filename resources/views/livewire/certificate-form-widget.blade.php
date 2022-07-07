<div>

    <div>
        @if($isPaided)
            <div class="jumbotron-fluid bg-info">
                <h3>Votre document a été soumis veuillez vous rendre dans votre juridiction de naissance avec les originaux</h3>
                <div>
                    <a href="" class="button">Revenir au Tableau de bord</a>
                </div>
            </div>
        @else
        <form wire:submit.prevent="save">
            {{ $this->form }}

        </form>
        @endif
    </div>

</div>
